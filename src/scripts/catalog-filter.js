export function initCatalogFilter() {
  const filter = document.querySelector('[data-catalog-filter]')

  if (!filter) return

  const url = new URL(location.href)

  const toggles = document.querySelectorAll('[data-catalog-filter-toggle]') || []

  toggles.forEach((toggle) => {
    const [option, param] = toggle.dataset.catalogFilterToggle.split(':')
    const currentParams = url.searchParams.has(option)
      ? url.searchParams.get(option).split(',')
      : []

    toggle.addEventListener('click', () => {
      const index = currentParams.indexOf(param)
      if (index === -1) {
        currentParams.push(param)
      } else {
        currentParams.splice(index, 1)
      }
      if (currentParams.length === 0) {
        url.searchParams.delete(option)
      } else {
        url.searchParams.set(option, currentParams.join(','))
      }
      location.href = url.href
    })
  })

  const sort = document.querySelector('[data-catalog-filter-sort]')
  if (sort) {
    sort.addEventListener('change', () => {
      if (!sort.value) {
        url.searchParams.delete('sort')
      } else {
        url.searchParams.set('sort', sort.value)
      }
      location.href = url.href
    })
  }

  const reset = document.querySelector('[data-catalog-filter-reset]')
  if (reset) {
    reset.addEventListener('click', () => {
      url.searchParams.delete('sort')
      toggles.forEach((toggle) => {
        const [option] = toggle.dataset.catalogFilterToggle.split(':')
        url.searchParams.delete(option)
      })
      location.href = url.href
    })
  }
}
