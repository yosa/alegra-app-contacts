Ext.define('Alegra.contacts.view.desktop.contacts.add.Form', {
    extend: 'Ext.form.Panel',
    alias: 'widget.contactsContactsAddForm',
    
    requires: [
        'Melisa.people.view.desktop.settlements.PostalCode'
    ],
    
    layout: 'hbox',
    scrollable: true,
    defaults: {
        xtype: 'container',
        layout: 'anchor',
        flex: 1,
        defaults: {
            xtype: 'textfield',
            anchor: '100%'
        }
    },
    items: [
        {
            items: [
                {
                    fieldLabel: 'Razón social',
                    name: 'name',
                    itemId: 'txtName',
                    allowBlank: false
                },
                {
                    fieldLabel: 'RFC',
                    name: 'identification',
                    allowBlank: false
                },
                {
                    fieldLabel: 'Correo electrónico',
                    name: 'email',
                    vtype: 'email'
                },
                {
                    fieldLabel: 'Teléfono 1',
                    name: 'phonePrimary'
                },
                {
                    fieldLabel: 'Teléfono 2',
                    name: 'phoneSecondary'
                },
                {
                    fieldLabel: 'Fax',
                    name: 'fax'
                },
                {
                    fieldLabel: 'Celular',
                    name: 'mobile'
                }
            ]
        },
        {
            margin: '0 10',
            items: [
                {
                    xtype: 'fieldset',
                    title: 'Domicilio fiscal',
                    defaults: {
                        layout: 'anchor',
                        xtype: 'textfield',
                        anchor: '100%'
                    },
                    items: [
                        {
                            xtype: 'peopleSettlementsPostalCode',
                            name: 'zipCode',
                            listeners: {
                                select: 'onSelectPostalCode'
                            }
                        },
                        {
                            name: 'address',
                            fieldLabel: 'Calle'
                        },
                        {
                            xtype: 'container',
                            layout: 'hbox',
                            defaults: {
                                xtype: 'textfield',
                                flex: 1
                            },
                            items: [
                                {
                                    name: 'exteriorNumber',
                                    fieldLabel: 'Número Exterior'
                                },
                                {
                                    name: 'interiorNumber',
                                    fieldLabel: 'Número interior',
                                    margin: '0 0 0 10'
                                }
                            ]
                        },
                        {
                            xtype: 'container',
                            layout: 'hbox',
                            defaults: {
                                xtype: 'textfield',
                                flex: 1
                            },
                            items: [
                                {
                                    name: 'colony',
                                    fieldLabel: 'Colonia',
                                    itemId: 'txtColony'
                                },
                                {
                                    name: 'locality',
                                    fieldLabel: 'Localidad',
                                    margin: '0 0 0 10',
                                    itemId: 'txtLocality'
                                }
                            ]
                        },
                        {
                            xtype: 'container',
                            layout: 'hbox',
                            defaults: {
                                xtype: 'textfield',
                                flex: 1
                            },
                            items: [
                                {
                                    name: 'municipality',
                                    fieldLabel: 'Municipio',
                                    itemId: 'txtMunicipality'
                                },
                                {
                                    name: 'state',
                                    fieldLabel: 'Estado',
                                    margin: '0 0 0 10',
                                    itemId: 'txtState',
                                    allowBlank: false
                                }
                            ]
                        },
                        {
                            name: 'country',
                            fieldLabel: 'País',
                            allowBlank: false
                        }
                    ]
                }
            ]
        },
        {
            margin: '0 0 0 15',
            items: [
                {
                    xtype: 'combodefault',
                    fieldLabel: 'Lista de precios',
                    name: 'priceList',
                    bind: {
                        store: '{priceList}'
                    }
                },
                {
                    xtype: 'combodefault',
                    fieldLabel: 'Vendedor',
                    name: 'idSeller',
                    bind: {
                        store: '{sellers}'
                    }
                },
                {
                    xtype: 'combodefault',
                    fieldLabel: 'Términos de pago',
                    name: 'term',
                    valueField: 'idLocal',
                    bind: {
                        store: '{paymentTerms}'
                    }
                },
                {
                    xtype: 'tagfield',
                    fieldLabel: 'Tipo de contacto',
                    name: 'type',
                    valueField: 'id',
                    encodeSubmitValue: true,
                    pageSize: 0,
                    bind: {
                        store: '{typesContacts}'
                    }
                },
                {
                    xtype: 'textarea',
                    fieldLabel: 'Observaciones',
                    name: 'observations'
                },
                {
                    xtype: 'checkbox',
                    name: 'includeStatement',
                    fieldLabel: 'Incluir estado de cuenta',
                    checked: true
                }
            ]
        }
    ]    
});
