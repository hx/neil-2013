$ = jQuery

contentElement = null

docElement = document.documentElement

makeIndexForHeadings = (headings) ->

  contentElement.append indexContainer = $ '<nav>', class: 'headingIndex'
  indexContainer.append list = $('<ul>')
    .on 'click a', (event) -> scrollToHeading $(event.target).parent().index()
  headings.each -> list.append $('<li>').append $ '<a>', href: 'javascript:', html: @innerHTML
  indexContainer.append arrow = $ '<span>', class: 'arrow', text: '▶'

  $.easing.easeOutCubic = (x, t, b, c, d) -> c * ((t = t / d - 1) * t * t + 1) + b

  scrollToHeading = (indexOrSlug) ->
    heading = headings.eq(indexOrSlug)
    scrollTop = heading.offset().top + heading.height() - docElement.clientHeight * .2
    $('html,body').animate
      scrollTop:  scrollTop
    ,
      duration:   500
      easing:     'easeOutCubic'
      done:       highlightScrolledHeading

    heading

  getScrolledHeading = ->
    threshold = docElement.clientHeight / 2
    for heading, index in headings
      top = $(heading).offset().top - docElement.scrollTop
      break if top > threshold
    index - 1

  scrollTimeout = null

  highlightScrolledHeading = ->
    active = list
      .children()
      .removeClass('active')
      .eq(getScrolledHeading())
      .addClass('active')
      .get(0)
    arrow.css
      left: active.firstChild.offsetLeft - 8
      top:  active.offsetTop + 3
    return

  $(window).on 'scroll', ->
    scrollTimeout = setTimeout ->
      scrollTimeout = null
      highlightScrolledHeading()
      return
    , 40 unless scrollTimeout
    return

  highlightScrolledHeading()

$ ->

  contentElement = $ 'article > div.content'
  if contentElement.height() > docElement.clientHeight
    headings = contentElement.find 'h2'
    if headings.size() > 1
      makeIndexForHeadings headings


  return
