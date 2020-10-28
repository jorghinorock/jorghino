<!DOCTYPE html>
<html>

<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet" />
  <!--<link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet" />-->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/materialdesignicons.min.css"/>
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/vuetify.min.css"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui" />
</head>

<body>
  <div id="app">
    <v-app>
      <v-app-bar color="red accent-4" dark max-height="80">
        <v-app-bar-nav-icon></v-app-bar-nav-icon>
        <v-toolbar-title>Mis Servicios Web</v-toolbar-title>
        <v-spacer></v-spacer>

        <!-- <v-chip dark color="green" class="py-0" large>{{total}}</v-chip> -->
        <v-badge :content="total" class="mr-12 mt-2" :value="total" color="green" overlap>
          <v-icon large>mdi-cash</v-icon>
        </v-badge>

      </v-app-bar>

      <v-main>
        <v-container>
          <v-row>
            <v-col cols="12">
              <v-list subheader three-line>
                <v-subheader>Categorias</v-subheader>  
                <v-list-item v-for="cat in categorias" :key="cat.id">
                  <v-list-item-content>
                    <v-list-item-title>{{cat.nombrecat}}</v-list-item-title>
                    <v-list-item-subtitle>{{cat.created_at}}</v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>

              </v-list>
            </v-col>
          </v-row>
<!--           <v-row>
            <pre>{{categorias}}</pre>
          </v-row> -->

          <v-stepper v-model="e1">
            <v-stepper-header>
              <v-stepper-step :complete="e1 > 1" step="1">Tipo de Sitio</v-stepper-step>
              <v-divider></v-divider>

              <v-stepper-step :complete="e1 > 2" step="2">Name of step 2</v-stepper-step>

              <v-divider></v-divider>

              <v-stepper-step step="3">Name of step 3</v-stepper-step>
            </v-stepper-header>

            <v-stepper-items>
              <v-stepper-content step="1">
                <tipos @calculartotaltipos="setTotalTipos" @next2="go2"></tipos>
                <v-divider inset vertical></v-divider>
              </v-stepper-content>

              <v-stepper-content step="2">
                <v-card class="mb-12" color="grey lighten-1" height="200px"></v-card>

                <v-btn color="primary" @click="e1 = 3">
                  Continue
                </v-btn>

                <v-btn text>Cancel</v-btn>
              </v-stepper-content>

              <v-stepper-content step="3">
                <v-card class="mb-12" color="grey lighten-1" height="200px"></v-card>

                <v-btn color="primary" @click="e1 = 1">
                  Continue
                </v-btn>

                <v-btn text>Cancel</v-btn>
              </v-stepper-content>
            </v-stepper-items>
          </v-stepper>
        </v-container>
      </v-main>
    </v-app>
  </div>

  <!--<script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>-->
  <script src="<?php echo base_url() ?>assets/js/components/vue.js"></script>
  <!--<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>-->
  <script src="<?php echo base_url() ?>assets/js/vuetyfy.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/components/tipos.js"></script>

  <script>
    new Vue({
      el: "#app",
      vuetify: new Vuetify(),
      data() {
        return {
          e1: 1,
          total: 0,
          categorias: []
        };
      },

      methods: {
        setTotalTipos(param) {
          this.total = 0;
          this.total = Number(this.total + param);
        },
        go2() {
          this.e1 = 2;
        },
      },
      mounted() {
        axios
          .get('http://localhost/prueba/home/categorias')
          .then(response => (this.categorias = response.data))
      },
    });
  </script>
</body>

</html>