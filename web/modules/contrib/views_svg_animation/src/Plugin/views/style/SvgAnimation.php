<?php

namespace Drupal\views_svg_animation\Plugin\views\style;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Entity\EntityTypeBundleInfoInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\File\FileUrlGeneratorInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\file\FileStorageInterface;
use Drupal\media\MediaStorage;
use Drupal\views\Plugin\views\style\Table;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Style plugin to extend table style from Drupal core with SVG animations.
 *
 * @ingroup views_style_plugins
 *
 * @ViewsStyle(
 *   id = "svg_animation",
 *   title = @Translation("SVG Animation"),
 *   help = @Translation("Displays rows in a table and lets them animate attached SVG files."),
 *   theme = "views_view_svg_animation",
 *   display_types = {"normal"}
 * )
 */
class SvgAnimation extends Table {

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected EntityTypeManagerInterface $entityTypeManager;

  /**
   * The entity type bundle info service.
   *
   * @var \Drupal\Core\Entity\EntityTypeBundleInfoInterface
   */
  protected EntityTypeBundleInfoInterface $entityTypeBundleInfo;

  /**
   * The config factory service.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected ConfigFactoryInterface $configFactory;

  /**
   * The media storage service.
   *
   * @var \Drupal\media\MediaStorage
   */
  protected MediaStorage $mediaStorage;

  /**
   * The file storage service.
   *
   * @var \Drupal\file\FileStorageInterface
   */
  protected FileStorageInterface $fileStorage;

  /**
   * The file url generator service.
   *
   * @var \Drupal\Core\File\FileUrlGeneratorInterface
   */
  protected FileUrlGeneratorInterface $fileUrlGenerator;

  /**
   * {@inheritdoc}
   */
  final public function __construct(array $configuration, $plugin_id, $plugin_definition, EntityTypeManagerInterface $entityTypeManager, EntityTypeBundleInfoInterface $entityTypeBundleInfo, ConfigFactoryInterface $configFactory, FileUrlGeneratorInterface $fileUrlGenerator) {
    $this->entityTypeManager = $entityTypeManager;
    $this->entityTypeBundleInfo = $entityTypeBundleInfo;
    $this->configFactory = $configFactory;
    /* @noinspection PhpFieldAssignmentTypeMismatchInspection */
    $this->mediaStorage = $entityTypeManager->getStorage('media');
    /* @noinspection PhpFieldAssignmentTypeMismatchInspection */
    $this->fileStorage = $entityTypeManager->getStorage('file');
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->fileUrlGenerator = $fileUrlGenerator;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition): static {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('entity_type.manager'),
      $container->get('entity_type.bundle.info'),
      $container->get('config.factory'),
      $container->get('file_url_generator')
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function defineOptions(): array {
    $options = parent::defineOptions();

    $options['svg_breakpoint'] = ['default' => 0];
    $options['svg_files'] = ['default' => []];
    $options['svg_field_object'] = ['default' => ''];
    $options['svg_field_object_mapping'] = ['default' => []];
    $options['svg_field_item'] = ['default' => ''];

    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state): void {

    $form['svg_breakpoint'] = [
      '#type' => 'number',
      '#title' => $this->t('SVG Breakpoint'),
      '#default_value' => $this->options['svg_breakpoint'],
      '#description' => $this->t('Minimum media query with from which the SVG files will be loaded and displayed.'),
    ];

    $svgFiles = [];
    foreach ($this->options['svg_files'] ?? [] as $item) {
      $svgFiles[] = $this->mediaStorage->load($item['target_id']);
    }
    $form['svg_files'] = [
      '#type' => 'entity_autocomplete',
      '#title' => $this->t('SVG Files'),
      '#tags' => TRUE,
      '#target_type' => 'media',
      '#selection_handler' => 'default',
      '#selection_settings' => [
        'target_bundles' => $this->getSvgBundles(),
      ],
      '#default_value' => $svgFiles,
      '#description' => $this->t('SVG file(s), separate multiple items with a comma.'),
    ];

    $field_labels = $this->displayHandler->getFieldLabels();
    $form['svg_field_object'] = [
      '#type' => 'select',
      '#title' => $this->t('Field containing SVG file selector'),
      '#options' => ['' => $this->t('- None -')] + $field_labels,
      '#default_value' => $this->options['svg_field_object'],
      '#description' => $this->t('Only required if multiple SVG files are being used.'),
    ];
    $map = '';
    foreach ($this->options['svg_field_object_mapping'] as $key => $value) {
      $map .= $key . '|' . $value . PHP_EOL;
    }
    $form['svg_field_object_mapping'] = [
      '#type' => 'textarea',
      '#title' => $this->t('SVG file mapping'),
      '#default_value' => $map,
      '#description' => $this->t('One line per SVG file, mapping the field value to the SVG file ID. Syntax: "field value|field"'),
      '#states' => [
        'invisible' => [
          'select[name="style_options[svg_field_object]"]' => ['value' => ''],
        ],
      ],
    ];
    $form['svg_field_item'] = [
      '#type' => 'select',
      '#title' => $this->t('Field containing SVG IDs'),
      '#options' => $field_labels,
      '#default_value' => $this->options['svg_field_item'],
      '#description' => $this->t('The field containing the IDs that are also used inside the SVG file to highlight selected items.'),
    ];
    parent::buildOptionsForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitOptionsForm(&$form, FormStateInterface $form_state): void {
    $objectMapping = [];
    foreach (explode(PHP_EOL, $form_state->getValue([
      'style_options',
      'svg_field_object_mapping',
    ], '')) as $item) {
      $parts = explode('|', trim($item));
      if (count($parts) === 2 && !empty(trim($parts[0])) && !empty(trim($parts[1]))) {
        $objectMapping[trim($parts[0])] = trim($parts[1]);
      }
    }
    $form_state->setValue([
      'style_options',
      'svg_field_object_mapping',
    ], $objectMapping);
    parent::submitOptionsForm($form, $form_state);
  }

  /**
   * Gets all media bundles that support SVG files.
   *
   * @return array
   *   List of SVG bundles.
   */
  protected function getSvgBundles(): array {
    static $targetBundles;
    if (!isset($targetBundles)) {
      $targetBundles = [];
      foreach ($this->entityTypeBundleInfo->getBundleInfo('media') as $bundleId => $info) {
        $sourceField = $this->configFactory->get('media.type.' . $bundleId)->get('source_configuration.source_field');
        $extensions = $this->configFactory->get('field.field.media.' . $bundleId . '.' . $sourceField)->get('settings.file_extensions');
        foreach (explode(' ', $extensions) as $extension) {
          if (mb_strtolower(trim($extension)) === 'svg') {
            $targetBundles[] = $bundleId;
          }
        }
      }
    }
    return $targetBundles;
  }

  /**
   * Prepare attributes for all view rows.
   *
   * @param array $variables
   *   Render array of the view.
   */
  public function getRowsAttributes(array $variables): void {
    $objects = count($this->options['svg_files']);
    switch ($objects) {
      case 0:
        $object_id = NULL;
        break;

      case 1:
        $object_id = $this->options['svg_files'][0]['target_id'];
        break;

      default:
        $object_id = 0;

    }
    foreach ($variables['rows'] as $index => $row) {
      /** @var \Drupal\Core\Template\Attribute $attribute */
      $attribute = $row['attributes'];
      if (($objects > 1) && !empty($this->options['svg_field_object'])) {
        $object = trim(strip_tags($this->tokenizeValue('{{ ' . $this->options['svg_field_object'] . ' }}', $index)));
        $object_id = $this->options['svg_field_object_mapping'][$object] ?? NULL;
      }
      if ($object_id !== NULL) {
        $attribute->setAttribute('svg-animation-object-id', $object_id);
      }
      $item = trim(strip_tags($this->tokenizeValue('{{ ' . $this->options['svg_field_item'] . ' }}', $index)));
      $attribute->setAttribute('svg-animation-item-id', $item);
    }
  }

  /**
   * Gets configuration for Drupal's javascript settings.
   *
   * @return array
   *   The javascript settings.
   */
  public function getDrupalSettings(): array {
    $files = [];
    foreach ($this->options['svg_files'] ?? [] as $item) {
      /** @var \Drupal\media\MediaInterface $media */
      if ($media = $this->mediaStorage->load($item['target_id'])) {
        $fid = $media->getSource()->getSourceFieldValue($media);
        /** @var \Drupal\file\FileInterface $file */
        if ($file = $this->fileStorage->load($fid)) {
          $files[] = [
            'path' => $this->fileUrlGenerator->generateString($file->getFileUri()),
            'id' => $media->id(),
          ];
        }
      }
    }
    return [
      'breakpoint' => $this->options['svg_breakpoint'],
      'files' => $files,
    ];
  }

}
