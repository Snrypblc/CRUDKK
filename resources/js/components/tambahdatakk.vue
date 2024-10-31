<template>
    <v-layout class="rounded rounded-md">
        <v-system-bar color="grey-darken-3"></v-system-bar>

        <!-- <v-navigation-drawer
        color="grey-darken-2"
        width="72"
        permanent
      ></v-navigation-drawer> -->

        <v-navigation-drawer expand-on-hover rail color="grey-darken-1" width="200" permanent>
            <v-list>
                <v-list-item prepend-avatar="https://randomuser.me/api/portraits/women/1.jpg"
                    subtitle="snrypblc@gmailcom" title="Sinar"></v-list-item>
            </v-list>

            <v-divider>
            </v-divider>

            <v-list density="compact" nav>
                <router-link to="/"><v-list-item prepend-icon="mdi-folder" title="Data"
                        value="myData"></v-list-item></router-link>
                <router-link to="/tambahdatakk"><v-list-item prepend-icon="mdi-account-multiple" title="Input Data KK"
                        value="shared"></v-list-item></router-link>
                <router-link to="/tambahdataktp"><v-list-item prepend-icon="mdi-account-multiple" title="Input Data KTP"
                        value="starred"></v-list-item></router-link>
            </v-list>
        </v-navigation-drawer>

        <v-app-bar color="grey-darken-1" height="48" flat></v-app-bar>
        <!--
        <v-navigation-drawer color="grey-lighten-2" location="right" width="150" permanent></v-navigation-drawer> -->

        <!-- <v-app-bar color="grey-darken-1" height="48" location="bottom" flat></v-app-bar> -->

        <v-main class="d-flex align-center justify-center" style="min-height: 300px;">

            <v-container>
                <v-col></v-col>
                <v-col></v-col>
                <v-card border="opacity-50 sm" class="mx-auto" max-width="1200" rounded="xl" variant="text">
                    <template v-slot:title>
                        <div class="mb-5text-caption font-weight-bold ">Tambah Data Kartu Keluarga</div>
                    </template>

                    <template v-slot:text>
                        <v-container>
                            <v-row>
                                <v-col cols="12" md="4" sm="6">
                                    <v-text-field v-model="kk.no_kk" label="NoKartuKeluarga"
                                        placeholder="NoKartuKeluarga" variant="underlined"></v-text-field>
                                </v-col>
                                <v-col cols="12" md="4" sm="6">
                                    <v-text-field v-model="kk.nama" label="NamaKepalaKeluarga"
                                        placeholder="NamaKepalaKeluarga" variant="underlined"></v-text-field>
                                </v-col>
                                <v-col cols="12" md="4" sm="6">
                                    <v-text-field v-model="kk.alamat" label="Alamat" placeholder="Alamat"
                                        variant="underlined"></v-text-field>
                                </v-col>
                                <v-col cols="12" md="4" sm="6">
                                    <v-text-field v-model="kk.rt_rw" label="RT/RW" placeholder="RT/RW"
                                        variant="underlined"></v-text-field>
                                </v-col><v-col cols="12" md="4" sm="6">
                                    <v-text-field v-model="kk.desa_kelurahan" label="Desa/Kelurahan"
                                        placeholder="Desa/Kelurahan" variant="underlined"></v-text-field>
                                </v-col><v-col cols="12" md="4" sm="6">
                                    <v-text-field v-model="kk.kecamatan" label="Kecamatan" placeholder="Kecamatan"
                                        variant="underlined"></v-text-field>
                                </v-col><v-col cols="12" md="4" sm="6">
                                    <v-text-field v-model="kk.kabupaten_kota" label="Kabupaten/Kota"
                                        placeholder="Kabupaten/Kota" variant="underlined"></v-text-field>
                                </v-col><v-col cols="12" md="4" sm="6">
                                    <v-text-field v-model="kk.kode_pos" label="Kode Pos" placeholder="Kode Pos"
                                        variant="underlined"></v-text-field>
                                </v-col><v-col cols="12" md="4" sm="6">
                                    <v-text-field v-model="kk.provinsi" label="Provinsi" placeholder="Provinsi"
                                        variant="underlined"></v-text-field>
                                </v-col><v-col cols="12" md="4" sm="6">
                                    <v-text-field v-model="kk.shdk" label="StatusHubunganDalamKeluarga"
                                        placeholder="StatusHubunganDalamKeluarga" variant="underlined"></v-text-field>
                                </v-col><v-col cols="12" md="4" sm="6">
                                    <v-text-field v-model="kk.ayah" label="Nama Ayah" placeholder="Nama Ayah"
                                        variant="underlined"></v-text-field>
                                </v-col>

                                <v-col cols="12" md="4" sm="6">
                                    <v-text-field v-model="kk.ibu" label="Nama Ibu" placeholder="Nama Ayah"
                                        variant="underlined"></v-text-field>
                                </v-col>
                            </v-row>
                        </v-container>
                        <small class="text-caption text-medium-emphasis d-flex justify-space-between align-center">
                            <v-col></v-col>
                            <v-col cols="1" md="2" sm="4">
                                <router-link to="/"><v-btn rounded="" block>Cancel</v-btn></router-link>
                            </v-col>
                            <v-col cols="3" md="2" sm="4">
                                <v-btn @click="postKk" rounded="" block>Save</v-btn>
                            </v-col>
                        </small>
                    </template>
                </v-card>


            </v-container>
        </v-main>


    </v-layout>
</template>

<script>
import axios from 'axios';


export default {
    data() {
        return {
            kk: {}
        }
    },

    created() {

    },
    mounted() {
        // this.postKk();
    },
    methods: {
        postKk() {
            const self = this;
            axios
                .post("http://127.0.0.1:8000/api/kk", self.kk)
                .then(function (response) {
                    console.log(response)
                    self.$router.push('/')
                    // window.location.reload()
                });
            // axios({
            //     method: 'post',
            //     url: 'http://127.0.0.1:8000/api/kk',
            //     headers: {
            //         Accept: 'application/json'
            //     },
            //     body: JSON.stringify(self.kk)
            // })
            // .then(function (response) {
            //     console.log(response)
            //     self.$router.push('kk')
            // });
        }
    }
}
</script>
