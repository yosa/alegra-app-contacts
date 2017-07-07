Ext.define('Alegra.contacts.view.universal.contacts.add.WrapperModel', {
    extend: 'Ext.app.ViewModel',
    alias: 'viewmodel.contactsContactsAdd',
    
    stores: {
        internalContacts: {
            proxy: {
                type: 'memory',
                data: []
            }
        },
        settlements: {
            proxy: {
                type: 'ajax',
                url: '{modules.settlements}',
                reader: {
                    type: 'json',
                    rootProperty: 'data'
                }
            }
        },
        sellers: {
            proxy: {
                type: 'ajax',
                url: '{modules.sellers}',
                reader: {
                    type: 'json',
                    rootProperty: 'data'
                }
            }
        },
        priceList: {
            proxy: {
                type: 'ajax',
                url: '{modules.priceList}',
                reader: {
                    type: 'json',
                    rootProperty: 'data'
                }
            }
        },
        paymentTerms: {
            proxy: {
                type: 'ajax',
                url: '{modules.paymentTerms}',
                reader: {
                    type: 'json',
                    rootProperty: 'data'
                }
            }
        },
        typesContacts: {
            data: [
                {
                    id: 'client',
                    name: 'Cliente'
                },
                {
                    id: 'provider',
                    name: 'Proveedor'
                }
            ],
            proxy: {
                type: 'memory'
            }
        }
    }
    
});
