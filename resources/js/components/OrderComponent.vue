<template>
    <div class="row mb-2">
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-4"><label for="">Zone</label></div>
                <div class="col-md-8">
                    <select id="zone" class="form-control" name="zone" v-model="zone_id" @change="fetchRegions">
                            <option v-for="zone in zones" :key="zone.id" :value="zone.id">{{zone.code}}</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-4"><label for="">Region</label></div>
                <div class="col-md-8">
                    <select id="zone" class="form-control" name="region" v-model="region_id" @change="fetchTerritories">
                            <option v-for="region in regions" :key="region.id" :value="region.id">
                                {{region.name}}</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-4"><label for="">Territory</label></div>
                <div class="col-md-8">
                    <select id="zone" class="form-control" name="territory" v-model="territory_id">
                            <option v-for="territory in territories" :key="territory.id" :value="territory.id">
                                {{ territory.name }}
                            </option>
                    </select>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-4"><label for="">Destributor</label></div>
                <div class="col-md-8">
                    <select id="zone" class="form-control" name="destributor" >
                            <option   :value="users.id">
                                {{ users.name }}
                            </option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['zones','users'],
        data(){
            return {
                zone_id:null,
                regions:[],
                region_id:null,
                territories:[],
                territory_id:null,
            }
        },
        methods:{
            fetchRegions(){
                axios.get('/territories/zones/'+this.zone_id+'/regions').then(res=>{
                    this.regions=res.data;
                })
            },
            fetchTerritories(){
                axios.get('/regions/'+this.region_id+'/territories').then(res=>{
                    this.territories=res.data;
                })
            }
        },
        mounted() {
            console.log(this.users)
        }
    }
</script>
