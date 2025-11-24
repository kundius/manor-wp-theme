import './src/fonts/Gilroy/stylesheet.css'
import './src/fonts/Raleway/stylesheet.css'
import './src/styles/tailwindcss.css'
import './src/styles/main.css'
import './src/styles/modal.css'
import './src/styles/header.css'
import './src/styles/footer.css'
import './src/styles/home.css'
import './src/styles/advantages.css'
import './src/styles/intro.css'
import './src/styles/portfolio-section.css'
import './src/styles/features.css'
import './src/styles/feedback.css'

import { initStickyHeader } from './src/scripts/sticky-header'
import fslightbox from 'fslightbox'
import { Mask, MaskInput } from 'maska'
import { initCallButton } from './src/scripts/call-button'
import { initScrollBehavior } from './src/scripts/scroll-behavior'
import { initShowcaseEmbla } from './src/scripts/showcase-embla'
import { initPopularEmbla } from './src/scripts/popular-embla'
import { initPortfolioEmbla } from './src/scripts/portfolio-embla'
import { initPortfolioModal } from './src/scripts/portfolio-modal'

new MaskInput('[data-maska]')

initStickyHeader()
initCallButton()
initScrollBehavior()
initShowcaseEmbla()
initPopularEmbla()
initPortfolioEmbla()
initPortfolioModal()
