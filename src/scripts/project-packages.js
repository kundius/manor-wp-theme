export function initProjectPackages() {
  const anchors = Array.from(document.querySelectorAll('[data-project-packages-anchor]'))
  const tabs = Array.from(document.querySelectorAll('[data-project-packages-tab]'))
  const contents = Array.from(document.querySelectorAll('[data-project-packages-content]'))

  tabs.forEach((tab) => {
    tab.addEventListener('click', () => {
      contents.forEach((content) => content.classList.remove('active'))
      tabs.forEach((tab) => tab.classList.remove('active'))

      tab.classList.add('active')

      const targetContent = contents.find(
        (content) => content.dataset.projectPackagesContent == tab.dataset.projectPackagesTab
      )
      if (targetContent) {
        targetContent.classList.add('active')
      }
    })
  })

  anchors.forEach((anchor) => {
    anchor.addEventListener('click', () => {
      contents.forEach((content) => content.classList.remove('active'))
      tabs.forEach((tab) => tab.classList.remove('active'))

      const targetTab = tabs.find(
        (tab) => tab.dataset.projectPackagesTab == anchor.dataset.projectPackagesAnchor
      )
      if (targetTab) {
        targetTab.classList.add('active')
        targetTab.scrollIntoView({ behavior: 'smooth' })
      }

      const targetContent = contents.find(
        (content) => content.dataset.projectPackagesContent == anchor.dataset.projectPackagesAnchor
      )
      if (targetContent) {
        targetContent.classList.add('active')
      }
    })
  })
}
