Ext.define('Alegra.contacts.view.desktop.contacts.add.WrapperController', {
    extend: 'Melisa.controller.Create',
    alias: 'controller.contactsContactsAdd',
    
    requires: [
        'Alegra.contacts.view.desktop.contacts.add.AddPeople',
        'Alegra.contacts.view.universal.contacts.add.WrapperController'
    ],
    
    mixins: {
        universal: 'Alegra.contacts.view.universal.contacts.add.WrapperController'
    },
    
    /**
     * Global event issued when the contact is created correctly 
     */
    eventSuccess: 'event.contacts.contacts.create.success',
    
    config: {
        windowPeople: null
    },
    
    onClickBtnDeletePeople: function(button) {
        this.getViewModel().getStore('internalContacts').remove(button.getViewModel().get('record'));
    },
    
    /**
     * Auto fill fields of colony, locality, etc.
     */
    onSelectPostalCode: function(field, record) {
        var me = this,
            view = me.getView(),
            txtColony = view.down('#txtColony'),
            txtLocality = view.down('#txtLocality'),
            txtMunicipality = view.down('#txtMunicipality'),
            txtState = view.down('#txtState'),
            next = field.nextNode();
        
        txtColony.setValue(record.get('settlement'));
        txtLocality.setValue(record.get('municipality'));
        txtMunicipality.setValue(record.get('municipality'));
        txtState.setValue(record.get('state'));
        next.focus();
    },
    
    onClickBtnEditPeople: function(button) {
        var me = this,
            windowPeople = me.createWindowPeople(),
            vmWindowPeople = windowPeople.getViewModel(),
            record = button.getViewModel().get('record');
        
        vmWindowPeople.set({
            modeUpdate: record,
            i18n: {
                btnSave: 'Modificar persona asociada'
            }
        });
        windowPeople.showBy(Ext.getBody(), 'tr-tr', [ '-350px', '100%' ]);
        windowPeople.down('form').loadRecord(record);
    },
    
    onClickBtnAddPeople: function() {
        var me = this,
            windowPeople = me.createWindowPeople();
        
        windowPeople.getViewModel().set('i18n.btnSave', 'Agregar persona asociada');
        windowPeople.showBy(Ext.getBody(), 'tr-tr', [ '-350px', '100%' ]);
    },
    
    createWindowPeople: function() {
        var me = this,
            windowPeople = me.getWindowPeople();
    
        if( windowPeople) {
            windowPeople.down('form').reset();
            return windowPeople;
        }
        
        windowPeople = Ext.create('widget.contactsContactsAddPeople', {
            controller: {
                save: Ext.bind(me.onSavePeople, me)
            },
            listeners: {
                close: Ext.bind(me.onCloseWindowPeople, me)
            }
        });
        
        me.setWindowPeople(windowPeople);
        return windowPeople;
    },
    
    onCloseWindowPeople: function(win) {
        win.getViewModel().set('modeUpdate', false);
    },
    
    onSavePeople: function() {
        var me = this,
            windowPeople = me.getWindowPeople(),
            form = windowPeople.down('form'),
            values = form.getValues(),
            basicForm = form.getForm(),
            vmWindowPeople = windowPeople.getViewModel(),
            recordUpdate = vmWindowPeople.get('modeUpdate');
        
        if( !form.isValid()) {
            return false;
        }
        
        if( recordUpdate) {
            if( !me.mixins.universal.updatePeople.call(me, recordUpdate, values, basicForm)) {
                return false;
            }
            vmWindowPeople.set('modeUpdate', false);
        } else if( !me.mixins.universal.addPeople.call(me, values, basicForm)) {
            return false;
        }
        
        form.reset();
        windowPeople.close();
        return false;        
    },
    
    save: function() {
        var me = this,
            stoInternalContacts = me.getViewModel().getStore('internalContacts'),
            internalContacts = [];
    
        stoInternalContacts.each(function(record) {
            internalContacts.push({
                name: record.data.name,
                lastname: record.data.lastname,
                email: record.data.email,
                phone: record.data.phone,
                mobile: record.data.mobile,
                /* is necesary send true on api */
                sendNotifications: record.data.sendNotifications ? true : false,
            });
        });
        
        me.getView().down('#txtInternalContacts').setValue(Ext.encode(internalContacts));        
        me.callParent(arguments);
    }
    
});
