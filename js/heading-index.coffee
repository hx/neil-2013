$ = jQuery

contentElement = null

makeIndexForHeadings = (headings) ->

  contentElement.append indexContainer = $ '<nav>', class: 'headingIndex'
  indexContainer.append list = $('<ul>')
    .on 'click a', (event) -> scrollToHeading $(event.target).parent().index()
  headings.each ->  list.append $('<li>').append $ '<a>', href: 'javascript:', html: @innerHTML

  indexContainer

  scrollToHeading = (indexOrSlug) ->
    # scroll to heading by index or slug

$ ->

  contentElement = $ 'article > div.content'
  if contentElement.height() > document.documentElement.clientHeight
    headings = contentElement.find 'h2'
    if headings.size() > 1
      makeIndexForHeadings headings


  return
