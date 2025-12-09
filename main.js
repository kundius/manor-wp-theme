import './src/fonts/Gilroy/stylesheet.css'
import './src/fonts/Raleway/stylesheet.css'
import './src/styles/tailwindcss.css'
import './src/styles/icons.css'
import './src/styles/content.css'
import './src/styles/main.css'
import './src/styles/modal.css'
import './src/styles/header.css'
import './src/styles/footer.css'
import './src/styles/template-home.css'
import './src/styles/single-project.css'
import './src/styles/single-case.css'
import './src/styles/template-catalog.css'
import './src/styles/template-contacts.css'
import './src/styles/template-portfolio.css'
import './src/styles/template-reviews.css'

import { Fancybox } from '@fancyapps/ui/dist/fancybox/'
import '@fancyapps/ui/dist/fancybox/fancybox.css'

import { initStickyHeader } from './src/scripts/sticky-header'
import fslightbox from 'fslightbox'
import { Mask, MaskInput } from 'maska'
import { initCallButton } from './src/scripts/call-button'
import { initScrollBehavior } from './src/scripts/scroll-behavior'
import { initShowcaseEmbla } from './src/scripts/showcase-embla'
import { initPopularEmbla } from './src/scripts/popular-embla'
import { initPortfolioEmbla } from './src/scripts/portfolio-embla'
import { initPortfolioModal } from './src/scripts/portfolio-modal'
import { initMobileMenu } from './src/scripts/mobile-menu'
import { initProjectMedia } from './src/scripts/project-media'
import { initGallery } from './src/scripts/gallery'
import { initProjectPackages } from './src/scripts/project-packages'
import { initSimilarEmbla } from './src/scripts/similar-embla'
import { initCatalogFilter } from './src/scripts/catalog-filter'

new MaskInput('[data-maska]')

initStickyHeader()
initCallButton()
initScrollBehavior()
initShowcaseEmbla()
initPopularEmbla()
initPortfolioEmbla()
initPortfolioModal()
initMobileMenu()
initProjectMedia()
initGallery()
initProjectPackages()
initSimilarEmbla()
initCatalogFilter()
