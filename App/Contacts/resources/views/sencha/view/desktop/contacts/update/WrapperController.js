Ext.define('Alegra.contacts.view.desktop.contacts.update.WrapperController', {
    extend: 'Alegra.contacts.view.desktop.contacts.add.WrapperController',
    alias: 'controller.contactsContactsUpdate',
    
    requires: [
        'Alegra.contacts.view.desktop.contacts.add.WrapperController',
        'Melisa.controller.AppendFields',
        'Melisa.controller.LoadData',
        'Melisa.controller.Update'
    ],
    
    mixins: {
        appendfields: 'Melisa.controller.AppendFields',
        loaddata: 'Melisa.controller.LoadData',
        update: 'Melisa.controller.Update'
    },
    
    eventSuccess: 'event.contacts.contacts.update.success',
    
    onSuccessLoadData: function (data) {
        var me = this,
            vm = me.getViewModel(),
            form = me.getView().down('form').getForm(),
            stoInternalContacts = vm.getStore('internalContacts'),
            stoSellers = vm.getStore('sellers'),
            stoPriceList = vm.getStore('priceList'),
            stoPaymentTerms = vm.getStore('paymentTerms');
    
        /* auto filling of fields */
        me.mixins.update.onSuccessLoadData.call(me, data);
        
        /* manual filling of fields */
        if( data.term) {
            stoPaymentTerms.add(data.term);
            form.findField('term').select(data.term.id);
        }
        
        if( data.seller) {
            stoSellers.add(data.seller);
            form.findField('idSeller').select(data.seller.id);
        }
        
        if( !Ext.isEmpty(data.internalContacts)) {
            Ext.each(data.internalContacts, function(record) {
                stoInternalContacts.add({
                    name: record.name,
                    /* its necesary */
                    lastname: record.lastName,
                    email: record.email,
                    phone: record.phone,
                    mobile: record.mobile,
                    sendNotifications: record.sendNotifications
                });
            });
        }
        
        if( data.priceList) {
            stoPriceList.add(data.priceList);
            form.findField('priceList').select(data.priceList.id);
        }
        
        if( !Ext.isEmpty(data.type)) {
            form.findField('type').setValue(data.type.toString());
        }
        
        form.setValues(data.address);
    }
    
});
