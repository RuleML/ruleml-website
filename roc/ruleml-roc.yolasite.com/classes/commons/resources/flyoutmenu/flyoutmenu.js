var flyoutMenu = flyoutMenu || {};

(function(){
	
	flyoutMenu.flyoutTimer = null;
	
	flyoutMenu.initFlyoutMenu =  function(menuData, mode) {
		
		for(var i = 0; i < menuData.length; i++) {
		
			var menuItem = $("#ys_menu_" + i);

			var subMenuPanelHTML = "<div id='ys_submenu_"+ i + "' class='ys_submenu' style='font-size:" + menuItem.css("font-size") + "; font-family:" + menuItem.css("font-family") + "'><div class='ys_submenu_inner'><ul>";
			for(var j = 0; j < menuData[i].children.length; j++) {
				subMenuPanelHTML += "<li onclick='window.location.href = \""+menuData[i].children[j].href+"\";'><a href='"+ menuData[i].children[j].href +"'>"+ menuData[i].children[j].name +"</a></li>";
			}
			subMenuPanelHTML += "</ul></div></div>";
			$("body").append(subMenuPanelHTML);
					
			var newSubMenuPanel = $("#ys_submenu_" + i);		
			
			menuItem.mouseenter({value:i, mode:mode, data:menuData}, function(event){
				
				window.clearTimeout(flyoutMenu.flyoutTimer);
				
				for(var i = 0; i < menuData.length; i++) {
					if(i == event.data.value) {
						continue;
					}
					var subMenuPanel = $("#ys_submenu_" + i);
					subMenuPanel.css("display", "none");
	
					
				}
				
				var subMenuPanel = $("#ys_submenu_" + event.data.value);
				
				if(event.data.mode == "flyover_vertical") {
					var menuItem = $("#ys_menu_" + event.data.value).find("a");
					var offset = menuItem.offset();
					subMenuPanel.css("top", offset.top);
					subMenuPanel.css("left", offset.left + menuItem.outerWidth() + 10);
				} else {
					var menuItem = $("#ys_menu_" + event.data.value).find("a");
					var offset = menuItem.offset();
					subMenuPanel.css("top", offset.top + menuItem.outerHeight());
					subMenuPanel.css("left", offset.left + parseInt(menuItem.css("padding-left")));
				}
			
				subMenuPanel.fadeIn("fast");
	
				if(subMenuPanel.outerWidth() < 150) {
					subMenuPanel.css("width", 150);
				}
			});
			
			menuItem.mouseleave({value:i}, function(event){
				var subMenuPanel = $("#ys_submenu_" + event.data.value);
				flyoutMenu.flyoutTimer = window.setTimeout(function(){subMenuPanel.fadeOut("fast");}, 300); 
			});
			
			
			newSubMenuPanel.mouseenter({value:i, mode:mode, data:menuData}, function(event){		
	
				window.clearTimeout(flyoutMenu.flyoutTimer);
							
				for(var i = 0; i < menuData.length; i++) {
					if(i == event.data.value) {
						continue;
					}
					var subMenuPanel = $("#ys_submenu_" + i);
					subMenuPanel.css("display", "none");
	
				}
				
				var subMenuPanel = $("#ys_submenu_" + event.data.value);			
				if(event.data.mode == "flyover_vertical") {
					var menuItem = $("#ys_menu_" + event.data.value).find("a");
					var offset = menuItem.offset();
					subMenuPanel.css("top", offset.top);
					subMenuPanel.css("left", offset.left + menuItem.outerWidth() + 10);
				} else {
					var menuItem = $("#ys_menu_" + event.data.value).find("a");
					var offset = menuItem.offset();
					subMenuPanel.css("top", offset.top + menuItem.outerHeight());
					subMenuPanel.css("left", offset.left + parseInt(menuItem.css("padding-left")));
				}
				subMenuPanel.css("display", "block");
			});
			
			newSubMenuPanel.mouseleave({value:i}, function(event){
				var subMenuPanel = $("#ys_submenu_" + event.data.value);
				flyoutMenu.flyoutTimer = window.setTimeout(function(){subMenuPanel.fadeOut("fast");}, 300); 
			});
		}
	}
})();