export function initCatalogFilter() {
  const filter = document.querySelector('[data-catalog-filter]')

  if (!filter) return

  const permalink = filter.dataset.catalogFilterPermalink
  const searchParams = new URLSearchParams(window.location.search)

  const toggles = document.querySelectorAll('[data-catalog-filter-toggle]') || []

  toggles.forEach((toggle) => {
    const [option, param] = toggle.dataset.catalogFilterToggle.split(':')
    const currentParams = searchParams.has(option) ? searchParams.get(option).split(',') : []

    toggle.addEventListener('click', () => {
      const index = currentParams.indexOf(param)
      if (index === -1) {
        currentParams.push(param)
      } else {
        currentParams.splice(index, 1)
      }
      if (currentParams.length === 0) {
        searchParams.delete(option)
      } else {
        searchParams.set(option, currentParams.join(','))
      }
      location.href = `${permalink}?${searchParams.toString()}`
    })
  })

  const sort = document.querySelector('[data-catalog-filter-sort]')
  if (sort) {
    sort.addEventListener('change', () => {
      if (!sort.value) {
        searchParams.delete('sort')
      } else {
        searchParams.set('sort', sort.value)
      }
      location.href = `${permalink}?${searchParams.toString()}`
    })
  }

  const reset = document.querySelector('[data-catalog-filter-reset]')
  if (reset) {
    reset.addEventListener('click', () => {
      searchParams.delete('sort')
      toggles.forEach((toggle) => {
        const [option] = toggle.dataset.catalogFilterToggle.split(':')
        searchParams.delete(option)
      })
      location.href = `${permalink}?${searchParams.toString()}`
    })
  }
}
