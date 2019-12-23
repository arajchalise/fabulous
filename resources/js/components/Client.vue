
<template>
<div class="container mb-5">
  <div class="text-center"data-aos="fade-up"
     data-aos-anchor-placement="top-bottom"data-aos-duration="1500">
    <h3 style ="font-weight: bold; font-family: times-new-roman"class="mt-5">OUR <span style="color: #730510; font-family: times-new-roman;">CLIENTS</span></h3>
  </div>
  <div class="text-center mt-3" data-aos="zoom-in"data-aos-duration="1500">
    <p style="font-family: times-new-roman">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </div>
  <div class="row pt-3">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="row">
        <div class="col-lg-2 col-sm-12 col-md-2"data-aos="fade-right"data-aos-duration="1500" v-for="client in clients" v-bind:key="client.id">
          <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12">
              <p class="text-center"><i class="fa fa-leaf fa-5x"></i></p>
            </div>
          </div>
          <h5 class="text-center"style="font-family: times-new-roman">{{ client.name}}</h5>
        </div>
      </div>
    </div>
  </div>
  
</div>
</template>


<script>
    export default {
        data(){
            return {
                clients: [],
                client: {
                    id: '',
                    name: '',
                    logo: '',
                    dept_id: ''
                }, 
                client_id: ''
            }
        }, 
        created(){
            this.fetchClients();
        }, 
        methods: {
            fetchClients(){
                fetch('api/clients')
                    .then(res => res.json())
                    .then(res => {
                        this.clients = res;
                    })
            }
        } 
    }
</script>
