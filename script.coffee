$ = jQuery

sidebarBgStyle = null

docElem = document.documentElement

fixSidebarBgHeight = ->
  sidebarBgStyle.height = 'auto'
  sidebarBgStyle.height = docElem.scrollHeight + 'px' if docElem.scrollHeight > docElem.clientHeight
  return

$ ->
  sidebarBgStyle = $('.neil2013-sidebar-bg')[0].style
  fixSidebarBgHeight()
  return

$(window).on 'resize', fixSidebarBgHeight