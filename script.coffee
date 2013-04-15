$ = jQuery



# sidebar background sizing

containerStyle = null
sidebarBgStyle = null

docElem = document.documentElement

fixSidebarBgHeight = ->
  containerStyle.height = '100%'
  containerStyle.height = docElem.scrollHeight + 'px' if docElem.scrollHeight > docElem.clientHeight
  sidebarBgStyle.width = Math.max(500, docElem.clientWidth / 2) + 'px'
  return

$(window).on 'resize', fixSidebarBgHeight



# on window load

$ ->

  # sidebar background sizing

  containerStyle = $('.n13-container')[0].style
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
