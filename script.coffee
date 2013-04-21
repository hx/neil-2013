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

  #footer sizing

  $('.n13-body')[0].style.paddingBottom = ($('.n13-footer')[0].offsetHeight + 20) + 'px'



  # sidebar background sizing

  containerStyle = $('.n13-background')[0].style
  sidebarBgStyle = $('.n13-sidebar-bg')[0].style
  fixSidebarBgHeight()



  # adding 'n13-active' class to active links

  activeClass = 'n13-active'
  activeUri = document.location.href.replace(/\?.*/, '').replace(/^\w+:\/\/|\/$/g, '')

  $('.n13-body a').each ->
    if @href.replace(/^\w+:\/\/|\/$/g, '') == activeUri
      $el = $(@).addClass activeClass
      $parent = $el.parent()
      $parent.addClass activeClass if $parent.is('li')
    return



  # make article summaries clickable

  $('.n13-posts').on 'click .article', (e) ->
    document.location = $(e.target).parents('article').find('h2 a').attr('href')
    return



  # move comment author fields to submit row

  $('#respond form > input').prependTo('#respond form p.form-submit');



  # replace submit buttons with links

  submit = $('<form>')[0].submit # forms with id #submit will replace the form's submit() method

  $('input[type=submit]').each ->
    old = $(@)
    form = old.parents('form')
    old.after($('<a>',
      href: 'javascript:'
      text: old.val()
      class: 'submit'
    ).on 'click', ->
      submit.call form.append($('<input>',
        type: 'hidden'
        name: old.attr('name')
        value: old.val()
      ))[0] if validate.call form[0]
      return
    ).remove()
    return



  # form validation

  patterns =
    comment:  /\w{5,}/
    author:   /\w{2,}/
    email:    /.+@.+\..+/

  validate = ->
    errors = []
    for id, pattern of patterns
      if @[id] && !pattern.exec(@[id].value)
        errors.push "Value for #{@[id].placeholder} is invalid."
    if errors.length
      alert errors.join "\n"
    return !errors.length

  # comment form validation
  $('form').on 'submit', validate

  return
