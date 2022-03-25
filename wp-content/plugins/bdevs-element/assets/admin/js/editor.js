;(function($) {
    'use strict';

    elementor.on('panel:init', function() {

        $('#elementor-panel-elements-search-input').on('keyup', _.debounce(function() {
            $('#elementor-panel-elements')
                .find('.hm')
                .parents('.elementor-element')
                .addClass('is-bdevselement-widget');
        }, 100));
        //Bdevs Element Grid Layer Shortcut Register
	    if ( typeof $e !== 'undefined' || $e !== null ) {

		    var option = {
			    callback: function() {
				    var bdevs_element_grid = elementor.settings.page.model.attributes.bdevs_element_grid;
				    if ( '' === bdevs_element_grid ) {
					    elementor.settings.page.model.setExternalChange( 'bdevs_element_grid', 'yes' );
				    } else if ( 'yes' === bdevs_element_grid ) {
					    elementor.settings.page.model.setExternalChange( 'bdevs_element_grid', '' );
				    }
			    }
		    };

		    $e.shortcuts.register( 'ctrl+shift+g', option);
		    $e.shortcuts.register( 'cmd+shift+g', option);
	    }
    });

    function getCssEffectsControlsMap() {

        return {
            'translate' : ['x', 'y', 'x_tablet', 'y_tablet', 'x_mobile', 'y_mobile'],
            'skew' : ['x', 'y', 'x_tablet', 'y_tablet', 'x_mobile', 'y_mobile'],
            'scale': ['x', 'y', 'x_tablet', 'y_tablet', 'x_mobile', 'y_mobile'],
            'rotate' : ['x', 'y', 'z', 'x_tablet', 'y_tablet', 'z_tablet', 'x_mobile', 'y_mobile', 'z_mobile']
        };
    }

    function bindCssTransformControls(effectSwitch, effectControl, widgetModel) {

        var settingPrefix = 'bdevs_element_transform_fx_';
        effectSwitch = settingPrefix + effectSwitch;
        effectControl = settingPrefix + effectControl;

        widgetModel.on('change:'+ effectSwitch, function(model, isActive) {
            if (!isActive) {
                var controlView = elementor.getPanelView().getCurrentPageView().children.find(function(view) {
                    return view.model.get('name') === effectControl;
                });
                widgetModel.set(effectControl, _.extend({}, widgetModel.defaults[effectControl]));
                controlView && controlView.render();
            }
        });
    }

    function initCssTransformEffects(model) {

        var widgetModel = elementorFrontend.config.elements.data[model.cid];
        _.each(getCssEffectsControlsMap(), function(effectProps, effectKey) {
            _.each(effectProps, function(effectProp) {
                bindCssTransformControls(
                    effectKey + '_toggle',
                    effectKey + '_' + effectProp,
                    widgetModel
                );
            })
        });

        // Event bindings cleanup
        elementor.getPanelView().getCurrentPageView().model.on('editor:close', function() {
            _.each(getCssEffectsControlsMap(), function(effectConfig, effectKey) {
                widgetModel.off('change:bdevs_element_transform_fx_'+effectKey+'_toggle');
            });
        });
    }

    elementor.hooks.addAction('panel/open_editor/widget', function(panel, model) {
        initCssTransformEffects(model);
    });

    if ( elementor.modules.controls.Icons ) {

        var WithBdevsElementIcons = elementor.modules.controls.Icons.extend({

            getControlValue: function() {
                
                var controlValue = this.constructor.__super__.getControlValue.call(this),
                    model = this.model,
                    valueToMigrate = this.getValueToMigrate(),
                    newValue = { value: '', library: 'bdevs-icons' },
                    elementSettingsModel = ( this.container && this.container.settings ) || this.elementSettingsModel;

                if ( _.isObject( controlValue ) &&
                    !_.isEmpty( controlValue ) &&
                    controlValue.library !== 'svg' &&
                    controlValue.value.indexOf( 'fashm' ) === 0
                ) {
                    newValue.value = controlValue.value.substr( controlValue.value.indexOf( 'fa fa-' ) );
                    elementSettingsModel.set( model.get( 'name' ), newValue );
                    return newValue;
                }

                if ( ! _.isObject( controlValue ) && valueToMigrate && valueToMigrate.indexOf( 'fa fa-' ) === 0 ) {
                    newValue.value = valueToMigrate;
                    elementSettingsModel.set( model.get( 'name' ), newValue );
                    return newValue;
                }

                if ( ! this.isMigrationAllowed() ) {
                    return valueToMigrate;
                }

                // Bail if no migration flag or no value to migrate
                if ( ! valueToMigrate ) {
                    return controlValue;
                }

                var didMigration = elementSettingsModel.get( this.dataKeys.migratedKey ),
                    controlName = model.get( 'name' );

                // Check if migration had been done and is stored locally
                if ( this.cache.migratedFlag[ controlName ] ) {
                    return this.cache.migratedFlag[ controlName ];
                }
                // Check if already migrated
                if ( didMigration && didMigration[ controlName ] ) {
                    return controlValue;
                }

                // Do migration
                return this.migrateFa4toFa5( valueToMigrate );
            }
        });

        elementor.addControlView( 'icons', WithBdevsElementIcons );
    }

    window.bdevs_element_has_icon_library = function() {

        return ( elementor.helpers && elementor.helpers.renderIcon );
    };

    window.bdevs_element_get_feature_label = function( text ) {

        var div = document.createElement('DIV');

        div.innerHTML = text;
        text = div.textContent || div.innerText || text;

        return text.length > 20 ? text.substring(0, 20) + "..." : text;
    };

    function bdevs_element_translate(stringKey, templateArgs) {

        return elementorCommon.translate(stringKey, null, templateArgs, BdevsElementEditor.i18n);
    }

    elementor.modules.layouts.panel.pages.menu.Menu.addItem({

        name: 'bdevselement-home',
        icon: 'fa fa-BdevsElement',
        title: bdevs_element_translate( 'editorPanelHomeLinkTitle' ),
        type: 'link',
        link: BdevsElementEditor.editorPanelHomeLinkURL,
        newTab: true
    }, 'settings');

    elementor.modules.layouts.panel.pages.menu.Menu.addItem({

        name: 'bdevselement-widgets',
        icon: 'fa fa-cross-game',
        title: bdevs_element_translate( 'editorPanelWidgetsLinkTitle' ),
        type: 'link',
        link: BdevsElementEditor.editorPanelWidgetsLinkURL,
        newTab: true
    }, 'settings');
    
    /**
     * Add pro widgets placeholder
     */
    elementor.hooks.addFilter( 'panel/elements/regionViews', function( regionViews ) {
        
        if ( BdevsElementEditor.hasPro || _.isEmpty( BdevsElementEditor.proWidgets ) ) {
            return regionViews;
        }

        var CATEGOERY_NAME = 'bdevs_element_pro',
            elementsView = regionViews.elements.view,
            categoriesView = regionViews.categories.view,
            elementsCollection = regionViews.elements.options.collection,
            categoriesCollection = regionViews.categories.options.collection,
            proWidgets = [],
            ElementView,
            freeCategoryIndex;

        _.each( BdevsElementEditor.proWidgets, function( widget, name ) {
            elementsCollection.add({
                name: 'bdevselement-' + name,
                title: widget.title,
                icon: widget.icon,
                categories: [ CATEGOERY_NAME ],
                editable: false,
            });
        });

		elementsCollection.each( function( element ) {
            if ( element.get( 'categories' )[0] === CATEGOERY_NAME ) {
                proWidgets.push( element );
            }
        } );

        freeCategoryIndex = categoriesCollection.findIndex({ name:'bdevs_element_category' });

        if ( freeCategoryIndex ) {
            categoriesCollection.add( {
                name: 'bdevs_element_pro_category',
                title: 'Bdevs Element',
                icon: 'fa fa-plug',
                defaultActive: false,
                items: proWidgets,
            }, {
                at: freeCategoryIndex + 1 
            });
        }

        ElementView = {
            className: function() {
                var className = this.constructor.__super__.className.call(this);
                if ( ! this.isEditable() && this.isBdevsElementWidget() ) {
                    className += ' bdevselement-element--promotion';
                }

                return className;
            },

            isBdevsElementWidget: function() {
                return this.model.get('name').indexOf('bdevselement-') === 0;
            },

            onMouseDown: function() {
                if ( ! this.isBdevsElementWidget() ) {
                    elementor.promotion.dialog.buttons[0].removeClass('bdevselement-btn--promotion');
                    this.constructor.__super__.onMouseDown.call(this);
                    return;
                }

                elementor.promotion.dialog.buttons[0].addClass('bdevselement-btn--promotion');

                elementor.promotion.showDialog( {
                    headerMessage: bdevs_element_translate( 'promotionDialogHeader', [ this.model.get( 'title' ) ] ),
                    message: bdevs_element_translate( 'promotionDialogMessage', [ this.model.get( 'title' ) ] ),
                    top: '-7',
                    element: this.el,
                    actionURL: 'http://elementor.bdevs.net/',
                } );
            }
        };

        regionViews.elements.view = elementsView.extend({
            childView: elementsView.prototype.childView.extend(ElementView)
        });

        regionViews.categories.view = categoriesView.extend({
            childView: categoriesView.prototype.childView.extend({
                childView: categoriesView.prototype.childView.prototype.childView.extend(ElementView)
            })
        });

        return regionViews;
    });

}(jQuery));
