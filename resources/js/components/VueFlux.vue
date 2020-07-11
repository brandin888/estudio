import { VueFlux, Transitions } from 'vue-flux';
import 'vue-flux/dist/vue-flux.css';

export default {
   components: {
      'vue-flux': VueFlux
   },

   data: () => ({
      fluxOptions: {
         autoplay: true
      },
      fluxImages: [
         'URL1',
         'URL2',
         'URL3'
      ],
      fluxTransitions: {
         transitionTurn3d: Transitions.transitionTurn3d
      }
   })
}