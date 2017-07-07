Ext.define('Alegra.contacts.view.desktop.contacts.add.Form', {
    extend: 'Ext.form.Panel',
    alias: 'widget.contactsContactsAddForm',
    
    requires: [
        'Melisa.people.view.desktop.settlements.PostalCode'
    ],
    
    scrollable: true,
    items: [
        {
            xtype: 'container',
            layout: 'hbox',
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
                                    name: 'street',
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
                            valueField: 'id',
                            bind: {
                                store: '{paymentTerms}'
                            }
                        },
                        {
                            xtype: 'tagfield',
                            fieldLabel: 'Tipo de contacto',
                            name: 'type',
                            valueField: 'id',
                            displayField: 'name',
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
        },
        {
            xtype: 'grid',
            title: 'Personas asociadas',
            emptyText: 'No hay personas asociadas',
            height: 300,
            border: 1,
            bind: {
                store: '{internalContacts}'
            },
            columns: [
                {
                    dataIndex: 'name',
                    text: 'Nombre completo',
                    flex: 1,
                    renderer: function(value, m, record) {
                        return [
                            (value ? value : ''),
                            (record.data.lastname ? record.data.lastname : '')
                        ].join(' ');
                    }
                },
                {
                    dataIndex: 'email',
                    text: 'Correo electrónico',
                    width: 190
                },
                {
                    dataIndex: 'phone',
                    text: 'Teléfono',
                    width: 150
                },
                {
                    dataIndex: 'mobile',
                    text: 'Celular',
                    width: 150
                },
                {
                    xtype: 'booleancolumn',
                    dataIndex: 'sendNotifications',
                    text: 'Enviar notificaciones',
                    tooltip: 'Marque esta opción cuando necesite que esta persona reciba correos con alertas sobre facturas disponibles y/o vencidas',
                    width: 150
                },
                {
                    xtype: 'widgetcolumn',
                    width: 30,
                    widget: {
                        xtype: 'button',
                        iconCls: 'x-fa fa-pencil',
                        tooltip: 'Modificar contacto',
                        handler: 'onClickBtnEditPeople',
                        bind: {
                            melisa: 'a'
                        }
                    }
                },
                {
                    xtype: 'widgetcolumn',
                    width: 30,
                    widget: {
                        xtype: 'button',
                        iconCls: 'x-fa fa-trash',
                        tooltip: 'Eliminar persona asociada',
                        handler: 'onClickBtnDeletePeople',
                        bind: {
                            melisa: 'a'
                        }
                    }
                }
            ],
            plugins: [
                {
                    ptype: 'floatingbutton',
                    configButton: {
                        handler: 'onClickBtnAddPeople',
                        iconCls: 'x-fa fa-user',
                        scale: 'large',
                        tooltip: 'Agregar persona asociada'
                    }
                }
            ]
        },
        {
            xtype: 'textfield',
            hidden: true,
            name: 'internalContacts',
            itemId: 'txtInternalContacts'
        }
    ]    
});
