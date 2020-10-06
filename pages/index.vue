<template>
  <v-container>
    <v-row justify="center" align="center">
      <v-col cols="12" sm="11" md="11" lg="11">
        <h1>Nascite 2020</h1>
        <v-carousel
          v-model="carousel"
          cycle
          interval="3000"
          vertical
          show-arrows="false"
          show-arrows-on-hover="true"
          progress-color="secondary"
          height="700"
        >
          <v-carousel-item
            v-for="i in n_photos"
            :key="i"
            :src="`https://picsum.photos/700/500?image=${i}`"
          ></v-carousel-item>
        </v-carousel>
      </v-col>
      <v-col cols="12" sm="11" md="9" lg="7">
        <h1>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at
          augue sit amet enim posuere pharetra ut et lorem. Sed cursus sed
          tellus a mattis. Etiam scelerisque dui in nisi efficitur, at malesuada
          diam tempor. Cras ullamcorper ut dui sit amet varius. Sed id nunc
          vitae lorem lacinia facilisis. Praesent vitae est dui. Curabitur nec
          tincidunt erat. Donec posuere congue diam, vel rutrum nibh porttitor
          non. Etiam a turpis nisi. Curabitur rhoncus maximus nisi, vel maximus
          neque gravida non. Quisque metus magna, hendrerit et maximus non,
          ullamcorper et quam. Aenean rutrum, purus vel interdum pulvinar, ex
          velit fringilla felis, id volutpat dui ipsum eu ante. Suspendisse
          facilisis risus eget suscipit mattis. Maecenas venenatis ullamcorper
          facilisis. Etiam mauris tellus, placerat ut nunc vel, iaculis tempor
          mauris. Proin auctor sapien ac orci varius imperdiet. Phasellus
          tincidunt laoreet sem, ut finibus nunc volutpat et. Praesent leo nisl,
          condimentum eget rutrum id, pharetra ac libero. Phasellus blandit
          vehicula lorem, vitae rutrum risus gravida vitae. Nulla tincidunt,
          nulla sit amet laoreet lobortis, ligula odio imperdiet turpis, sit
          amet tempus lectus urna a enim. Donec rhoncus elit vitae tincidunt
          semper. Proin lacinia lorem a enim ullamcorper, quis iaculis mauris
          facilisis. Ut lacinia dapibus lacus, sed consequat tellus semper vel.
          Vestibulum mattis metus sed mauris consectetur, ac gravida eros
          vehicula. Proin et felis leo. Morbi ligula quam, hendrerit non iaculis
          id, faucibus vel justo. Nunc eu euismod est. Fusce ultricies dignissim
          tortor, sit amet aliquet velit pulvinar sit amet. Integer porta quam
          nec metus scelerisque mattis. Donec venenatis dolor turpis, ac
          accumsan lorem placerat vel. Ut vehicula scelerisque quam, eget
          molestie elit. Vestibulum consequat justo eget ligula aliquam
          suscipit. Pellentesque consequat luctus metus vitae rhoncus. Quisque
          laoreet vestibulum nisi sit amet ultrices. Curabitur sed rhoncus nunc.
          Donec mattis aliquam ex sit amet pretium. Quisque ut hendrerit sem.
          Curabitur auctor, risus id luctus pellentesque, erat tellus fermentum
          diam, ac pulvinar nunc eros non tellus. Vivamus ut euismod ligula.
          Nullam consectetur ac leo semper consectetur. Integer dolor justo,
          dapibus ut libero et, tincidunt vehicula mauris. Donec placerat
          malesuada porta. Nulla eget ipsum quam. Duis ultrices mi ut urna
          auctor vestibulum. Nullam rhoncus semper justo eget molestie. In quis
          nibh at libero viverra ornare at non odio. Maecenas ultricies, elit a
          placerat mollis, ligula nisl tempor lorem, sit amet scelerisque magna
          enim in lorem. Ut vel vulputate sem. Aenean eget nunc aliquam,
          eleifend nunc in, lobortis sem. Donec placerat elit eu odio laoreet
          vestibulum. Nunc euismod, turpis vel aliquet accumsan, nibh nisl
          ultrices magna, quis sodales dolor nisl nec diam. Sed facilisis, urna
          sit amet faucibus maximus, mi nunc auctor neque, id rhoncus eros odio
          aliquam arcu. Nullam eleifend augue mi. Aenean dapibus mi ut tristique
          lacinia. In tincidunt mauris dolor, in viverra sapien porttitor at.
          Praesent aliquam vestibulum lectus, vitae vehicula augue consectetur
          sed. Duis nec diam arcu. Sed viverra gravida lacus quis semper. Etiam
          vitae mi ac eros convallis vulputate id eget mauris. Aenean tempus
          ornare convallis. Maecenas ut mi tortor. Donec faucibus venenatis
          gravida. Sed vitae imperdiet felis, et molestie tellus.
        </h1>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  components: {},

  data() {
    return {
      carousel: 0,
      n_photos: 6,
    }
  },

  head() {
    return {
      title: 'Home',
    }
  },
}
</script>
