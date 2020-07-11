


<script>
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
         'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.adslzone.net%2Fcomo-se-hace%2Fphotoshop%2Fquitar-fondo-imagen%2F&psig=AOvVaw0xxsCvbnuFK_gxFnJGTUop&ust=1594582911954000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCPDN97n6xeoCFQAAAAAdAAAAABAD',
         'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.adslzone.net%2Fcomo-se-hace%2Fphotoshop%2Fquitar-fondo-imagen%2F&psig=AOvVaw0xxsCvbnuFK_gxFnJGTUop&ust=1594582911954000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCPDN97n6xeoCFQAAAAAdAAAAABAD',
         'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.adslzone.net%2Fcomo-se-hace%2Fphotoshop%2Fquitar-fondo-imagen%2F&psig=AOvVaw0xxsCvbnuFK_gxFnJGTUop&ust=1594582911954000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCPDN97n6xeoCFQAAAAAdAAAAABAD'
      ],
      fluxTransitions: {
         transitionTurn3d: Transitions.transitionTurn3d
      }
   })
}
</script>