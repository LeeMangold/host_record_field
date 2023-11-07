<?php

namespace Drupal\host_record_field\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'host_record_default' widget.
 *
 * @FieldWidget(
 *   id = "host_record_default",
 *   label = @Translation("Host record default"),
 *   field_types = {
 *     "host_record"
 *   }
 * )
 */
class HostRecordWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state): array
  {
    $element['record_type'] = [
      '#type' => 'select',
      '#title' => $this->t('Record Type'),
      '#default_value' => isset($items[$delta]->record_type) ? $items[$delta]->record_type : NULL,
      '#options' => [
        'A' => 'A',
        'AAAA' => 'AAAA',
        'AFSDB' => 'AFSDB',
        'APL' => 'APL',
        'CAA' => 'CAA',
        'CDNSKEY' => 'CDNSKEY',
        'CDS' => 'CDS',
        'CERT' => 'CERT',
        'CNAME' => 'CNAME',
        'CSYNC' => 'CSYNC',
        'DHCID' => 'DHCID',
        'DLV' => 'DLV',
        'DNAME' => 'DNAME',
        'DNSKEY' => 'DNSKEY',
        'DS' => 'DS',
        'EUI48' => 'EUI48',
        'EUI64' => 'EUI64',
        'HINFO' => 'HINFO',
        'HIP' => 'HIP',
        'HTTPS' => 'HTTPS',
        'IPSECKEY' => 'IPSECKEY',
        'KEY' => 'KEY',
        'KX' => 'KX',
        'LOC' => 'LOC',
        'MX' => 'MX',
        'NAPTR' => 'NAPTR',
        'NS' => 'NS',
        'NSEC' => 'NSEC',
        'NSEC3' => 'NSEC3',
        'NSEC3PARAM' => 'NSEC3PARAM',
        'OPENPGPKEY' => 'OPENPGPKEY',
        'PTR' => 'PTR',
        'RRSIG' => 'RRSIG',
        'RP' => 'RP',
        'SIG' => 'SIG',
        'SMIMEA' => 'SMIMEA',
        'SOA' => 'SOA',
        'SRV' => 'SRV',
        'SSHFP' => 'SSHFP',
        'SVCB' => 'SVCB',
        'TA' => 'TA',
        'TKEY' => 'TKEY',
        'TLSA' => 'TLSA',
        'TSIG' => 'TSIG',
        'TXT' => 'TXT',
        'URI' => 'URI',
        'ZONEMD' => 'ZONEMD'
      ],
      '#empty_option' => $this->t('- Select -'),
      '#required' => FALSE,
    ];

    $element['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
      '#default_value' => isset($items[$delta]->name) ? $items[$delta]->name : '',
      '#maxlength' => 255,
      '#required' => FALSE,
    ];

    $element['value'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Value'),
      '#default_value' => isset($items[$delta]->value) ? $items[$delta]->value : '',
      '#rows' => 4,
      '#required' => FALSE,
    ];

    return $element;
  }

}
