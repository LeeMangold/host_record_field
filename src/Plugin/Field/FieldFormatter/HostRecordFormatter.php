<?php

namespace Drupal\host_record_field\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'host_record_default' formatter.
 *
 * @FieldFormatter(
 *   id = "host_record_default",
 *   label = @Translation("Host record default"),
 *   field_types = {
 *     "host_record"
 *   }
 * )
 */
class HostRecordFormatter extends FormatterBase
{
  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode): array
  {
    $rows = [];

    foreach ($items as $item) {
      // Add each record as a row in the table.
      if (!empty($item->record_type)) {
        $rows[] = [
          'record_type' => $item->record_type,
          'name' => $item->name,
          'value' => $item->value,
        ];
      }
    }

    // Generate the render array for the table.
    $element[] = [
      '#type' => 'table',
      '#header' => [
        $this->t('Record Type'),
        $this->t('Name'),
        $this->t('Value'),
      ],
      '#rows' => $rows,
      '#empty' => $this->t('No host records available.'),
      '#attributes' => ['class' => ['host-record-table']],
    ];

    return $element;
  }

}
