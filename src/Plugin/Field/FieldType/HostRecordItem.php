<?php

namespace Drupal\host_record_field\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'host_record' field type.
 *
 * @FieldType(
 *   id = "host_record",
 *   label = @Translation("Host record"),
 *   description = @Translation("A field for host records."),
 *   category = @Translation("Custom"),
 *   default_widget = "host_record_default",
 *   default_formatter = "host_record_default"
 * )
 */
class HostRecordItem extends FieldItemBase {

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition): array
  {
    return [
      // Define the database schema to store field data.
      'columns' => [
        'record_type' => [
          'type' => 'varchar',
          'length' => 255,
        ],
        'name' => [
          'type' => 'varchar',
          'length' => 255,
        ],
        'value' => [
          'type' => 'text',
          'size' => 'big',
        ],
      ],
      'indexes' => [
        // Create a custom index if necessary for your queries.
        'record_type' => ['record_type'],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition): array
  {
    $properties = [];

    $properties['record_type'] = DataDefinition::create('string')
      ->setLabel(t('Record Type'))
      ->setDescription(t('The type of the DNS record.'))
      ->setRequired(TRUE);

    $properties['name'] = DataDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('The name for the DNS record.'))
      ->setRequired(TRUE);

    $properties['value'] = DataDefinition::create('string')
      ->setLabel(t('Value'))
      ->setDescription(t('The value for the DNS record.'))
      ->setRequired(TRUE);

    return $properties;
  }
}
