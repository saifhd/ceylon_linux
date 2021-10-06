<template>
    <div>
        <div class="form-group row">
            <label for="zone" class="col-md-4 col-form-label text-md-right">Zone Code</label>

            <div class="col-md-6">

                <select id="zone" class="form-control" name="zone" @change="fetchReagions" v-model="zone_id">
                    <option v-for="zone in zones" :key="zone.id" :value="zone.id" >
                        {{zone.code}}</option>


                </select>
            </div>
        </div>
         <div class="form-group row">
            <label for="zone" class="col-md-4 col-form-label text-md-right">Region</label>

            <div class="col-md-6">

                <select id="zone" class="form-control" name="region" v-model="region_id">
                    <option v-for="region in regions" :key="region.id" :value="region.id">{{region.name}}</option>

                </select>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props:['zones','territory'],
        data(){
            return{
                regions:{},
                zone_id:null,
                region_id:null
            }
        },
        methods:{
            fetchReagions(){
                console.log(this.zone_id);
                axios.get('/territories/zones/'+this.zone_id+'/regions').then(res=>{
                    this.regions=res.data;
                })
            }
        },
        mounted() {
                axios.get('/regions/'+this.territory.region_id+'/zone').then(res=>{
                    this.zone_id=res.data.id;
                    this.fetchReagions();
                    this.region_id=this.territory.region_id;
                });

        }
    }
</script>
