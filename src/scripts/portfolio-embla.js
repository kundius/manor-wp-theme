import EmblaCarousel from 'embla-carousel'
import { addPrevNextBtnsClickHandlers } from './EmblaCarouselArrowButtons'

export function applyPortfolioEmbla(root) {
  const viewportNode = root.querySelector('[data-portfolio-embla-viewport]')

  const emblaApi = EmblaCarousel(viewportNode, { loop: true, slidesToScroll: 'auto' })

  const prevBtnNode = root.querySelector('[data-portfolio-embla-prev]')
  const nextBtnNode = root.querySelector('[data-portfolio-embla-next]')
  if (prevBtnNode && nextBtnNode) {
    const removePrevNextBtnsClickHandlers = addPrevNextBtnsClickHandlers(
      emblaApi,
      prevBtnNode,
      nextBtnNode
    )
    emblaApi.on('destroy', removePrevNextBtnsClickHandlers)
  }
}

export function initPortfolioEmbla() {
  const nodes = Array.from(document.querySelectorAll('[data-portfolio-embla]'))
  nodes.forEach(applyPortfolioEmbla)
}
