jQuery.noConflict();
var pnuts = null;
(function($) { 

stampMaps = {};

function Stamp(name) {
    var _this = this;
    stampMaps[name] = stampMaps[name] || 1;

    this.get = function() {
        var index = ++stampMaps[name];
        return function() {
            return index == stampMaps[name];
        }
    };

    this.toggle = function() {
        isShow ? _this.show() : _this.hide;
    };
};

	

function Pane() {
    var _this = this;

    var q_outer = $('#pane-outer');
    var q_shell = $('#pane-shell');
    var q_base = $('#pane-base');
    var q_components = $('.pane-components');

    var q_closeButton = $('.pane-close', q_outer).click(function() {
        _this.hide();
    });

    $(window).scroll(function() {
        q_shell.css('left', -q_outer.offset().left);
    });

    var isShow = false;

    var stamp = null;

    this.setTitle = function() {
    };
	
	var clearHandlers = [];
	
	var handleClear = function() {
		$(clearHandlers).each(function() {
			this();
		});
		clearHandlers = [];
	};
		
    this.clear = function() {
		handleClear();
		q_components.html('');
    };	

    this.addComponent = function(component, clearHandler) {
		clearHandlers.push(clearHandler);
		
        return $('<div class="component"></div>')
            .append(component)
            .appendTo(q_components);
    };
	
	var pane_type = hostucan_pane_type || 'slide-right';

	var show_animate = function(callback) {
	
		var all_callback = function() {
			stamp() && callback && callback();
		};
		q_base.stop(true, true);
		switch(pane_type) {
			case "none":
				q_base.css('width', 540);
				q_outer.css('display', 'block');
				all_callback();
				break;
			case "fade":
				q_base.css('width', 540);
				q_outer.css('display', 'none');
				q_outer.fadeIn('fast', all_callback);
				break;
			default:
				q_outer.css('display', 'block');
				q_base
				.animate({ width: 540 }, 'fast', all_callback);
				break;
		}
	};
	
	var hide_animate = function(callback) {
		q_base
            .stop(true, true);
			
		var all_callback = function() {
			q_base.css('width', 0);
            q_outer.css('display', 'none');
			handleClear();
            stamp() && callback && callback();
		};
		
		switch(pane_type) {
			case "none":
				all_callback();
				break;
			case "fade":
				q_outer.fadeOut('fast', all_callback);
				break;
			default:		
				q_base.animate({ width: 0 }, 'fast', all_callback);
				break;
		}
	};
	
	

    this.show = function(callback) {		
        stamp = (new Stamp('Pane')).get();
		
		isShow || show_animate(callback);
        isShow = true;
    }

    this.hide = function(callback) {
        stamp = (new Stamp('Pane')).get();
		
		isShow && hide_animate(callback);
        isShow = false;
    }
	
	this.getComponents = function() {
		return q_components;
	};
	
	this.toggle = function(callback) {
		isShow ? this.hide(callback) : this.show(callback);
	}
}
		
var TeaserEntity = function(pane, entity) {
	var url = $(entity).find('.entry-title a').attr('href');
	
	var showContent = function(callback, position) {
		pane.clear();
		pane.show();		
		$(entity).addClass('focused');
		return pane.addComponent(
			$('<div></div>').load(url + ' #content .entries',
				function() {
					if(position && $(position, comp).length) {
						var paneComp = pane.getComponents();
						paneComp.scrollTop($(position, comp).offset().top - paneComp.offset().top);
					}
					callback();
				}
			), 
			function() {
			$(entity).removeClass('focused');
			});
	};
	
	var entity_show = function(position) {
		if(!url) { return false; }
		
		var refresh_callback = function() {
			$('form', comp).each(function() {
				$(this).submit(function() {
					$(this).ajaxSubmit({
						success: function() {
							comp = showContent(refresh_callback, '#comments');
						}
					});
					$(this).find('input, textarea').attr('disabled', 'disabled');
					return false;
				});
			});
		};
		
		comp = showContent(refresh_callback, position);
		return false;
	};		
	
	$(entity).click(function(event) {
		if($(event.target).is('a') && !$(event.target).is('.entry-title a')) { return true; }
		if($(entity).hasClass('focused')) {
			pane.clear();
			pane.hide();
			return;
		}
		entity_show();
		return false;
	});
	
	$(entity).find('.comments-link a').click(function() {
		entity_show('#comments');
		return false;
	});	
};
	
$(function() {	

    var resize = function() {
        $("#container").css('min-height', Math.max($(window).height() - 60, $('#dashboard').height() + 20));
    }

    resize();
    $(window).resize(resize);

	var pane = new Pane();
	$('#container .post, #container .page').each(function() {
		new TeaserEntity(pane, this);
	});
	
	var lastMenu = $('#content .page_item:last');
	var menus = $('#content .menu');
	menus.height(lastMenu.offset().top - menus.offset().top + 31);
});	

	
}(jQuery));
