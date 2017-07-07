Ext.define('Alegra.contacts.view.universal.contacts.view.WrapperModel', {
    extend: 'Ext.app.ViewModel',
    alias: 'viewmodel.contactsContactsView',
    
    stores: {
        contacts: {
            autoLoad: true,
            remoteFilter: true,
            remoteSort: true,
            proxy: {
                type: 'ajax',
                url: '{modules.contacts}',
                reader: {
                    type: 'json',
                    rootProperty: 'data'
                }
            }
        }
    }
    
});
