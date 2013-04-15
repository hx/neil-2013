$ = jQuery



# sidebar background sizing

sidebarBgStyle = null

docElem = document.documentElement

fixSidebarBgHeight = ->
  sidebarBgStyle.height = 'auto'
  sidebarBgStyle.height = docElem.scrollHeight + 'px' if docElem.scrollHeight > docElem.clientHeight
  return

$(window).on 'resize', fixSidebarBgHeight



# on window load

$ ->

  # sidebar background sizing

  sidebarBgStyle = $('.n13-sidebar-bg')[0].style
  fixSidebarBgHeight()



  # adding 'n13-active' class to active links

  activeClass = 'n13-active'
  activeUri = document.location.href.replace(/\?.*/, '').replace(/^\w+:\/\/|\/$/g, '')

  console.log activeUri

  $('.n13-body a').each ->
    if @href.replace(/^\w+:\/\/|\/$/g, '') == activeUri
      $el = $(@).addClass activeClass
      $parent = $el.parent()
      $parent.addClass activeClass if $parent.is('li')
    return

  return
