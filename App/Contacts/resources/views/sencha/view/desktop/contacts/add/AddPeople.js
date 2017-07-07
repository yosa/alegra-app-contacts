Ext.define('Alegra.contacts.view.desktop.contacts.add.AddPeople', {
    extend: 'Melisa.view.desktop.wrapper.window.Add',
    alias: 'widget.contactsContactsAddPeople',
    
    iconCls: 'x-fa fa-user',
    title: 'Agregar persona asociada',
    height: '100%',
    closeAction: 'hide',
    maskClickAction: 'hide',
    defaultFocus: 'txtName',
    draggable: false,
    width: 350,
    viewModel: {
        data: {
            modeUpdate: false
        }
    },
    bind: {
        title: '{modeUpdate ? "Modificar" : "Agregar"} persona asociada'
    },
    items: [
        {
            xtype: 'form',
            defaults: {
                xtype: 'textfield',
                anchor: '100%'
            },
            items: [
                {
                    name: 'name',
                    fieldLabel: 'Nombre',
                    itemId: 'txtName'
                },
                {
                    name: 'lastname',
                    fieldLabel: 'Apellidos'
                },
                {
                    name: 'email',
                    fieldLabel: 'Correo electrónico',
                    vtype: 'email'
                },
                {
                    name: 'phone',
                    fieldLabel: 'Teléfono'
                },
                {
                    name: 'mobile',
                    fieldLabel: 'Celular'
                },
                {
                    xtype: 'checkbox',
                    name: 'sendNotifications',
                    fieldLabel: 'Enviar notificaciones'
                }
            ]
        }
    ]
});