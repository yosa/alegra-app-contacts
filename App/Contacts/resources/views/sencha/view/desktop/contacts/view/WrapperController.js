Ext.define('Alegra.contacts.view.desktop.contacts.view.WrapperController', {
    extend: 'Melisa.controller.View',
    alias: 'controller.contactsContactsView',
    
    requires: [
        'Melisa.controller.View'
    ],
    
    listen: {
        global: {
            'event.contacts.contacts.update.success': 'onUpdatedRecord',
            'event.contacts.contacts.create.success': 'onUpdatedRecord'
        }
    },
    
    storeReload: 'contacts',
    windowReportConfig: {
        title: 'Contacto'
    }
    
});
