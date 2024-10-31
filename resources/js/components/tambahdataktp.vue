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
                <v-list-item prepend-icon="mdi-account-multiple" title="Input Data KTP" value="starred"></v-list-item>
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
                        <div class="mb-5text-caption font-weight-bold ">Tambah Data Kartu Tanda Penduduk</div>
                    </template>

                    <template v-slot:text>
                        <v-container>
                            <v-row>
                                <v-col cols="12" md="4" sm="6">
                                    <v-text-field label="NIK" v-model="ktp.nik" placeholder="NIK"
                                        variant="underlined"></v-text-field>
                                </v-col>
                                <v-col cols="12" md="4" sm="6">
                                    <v-text-field v-model="ktp.nama" label="Nama" placeholder="Nama"
                                        variant="underlined"></v-text-field>
                                </v-col>
                                <v-col cols="12" md="4" sm="6">
                                    <v-text-field v-model="ktp.tempat" label="Tempat" placeholder="Tempat/Tgl Lahir"
                                        variant="underlined"></v-text-field>
                                </v-col>
                                <v-col cols="12" md="4" sm="6">
                                    <v-text-field v-model="ktp.tanggal_lahir" label="Tgl Lahir"
                                        placeholder="Tempat/Tgl Lahir" variant="underlined"></v-text-field>
                                </v-col>
                                <v-col cols="12" md="4" sm="6">
                                    <v-text-field v-model="ktp.jenis_kelamin" label="Jenis Kelamin"
                                        placeholder="Jenis Kelamin" variant="underlined"></v-text-field>
                                </v-col><v-col cols="12" md="4" sm="6">
                                    <v-text-field v-model="ktp.gol_darah" label="Gol Darah" placeholder="Gol Darah"
                                        variant="underlined"></v-text-field>
                                </v-col><v-col cols="12" md="4" sm="6">
                                    <v-text-field v-model="ktp.alamat" label="Alamat" placeholder="Alamat"
                                        variant="underlined"></v-text-field>
                                </v-col><v-col cols="12" md="4" sm="6">
                                    <v-text-field v-model="ktp.rt_rw" label="RT/RW" placeholder="RT/RW"
                                        variant="underlined"></v-text-field>
                                </v-col><v-col cols="12" md="4" sm="6">
                                    <v-text-field v-model="ktp.desa_kelurahan" label="Desa/Kelurahan"
                                        placeholder="Desa/Keelurahan" variant="underlined"></v-text-field>
                                </v-col><v-col cols="12" md="4" sm="6">
                                    <v-text-field v-model="ktp.kecamatan" label="Kecamatan" placeholder="Kecamatan"
                                        variant="underlined"></v-text-field>
                                </v-col><v-col cols="12" md="4" sm="6">
                                    <v-text-field v-model="ktp.agama" label="Agama" placeholder="Agama"
                                        variant="underlined"></v-text-field>
                                </v-col><v-col cols="12" md="4" sm="6">
                                    <v-text-field v-model="ktp.status_perkawinan" label="Status Perkawinan"
                                        placeholder="Status Perkawinan" variant="underlined"></v-text-field>
                                </v-col>

                                <v-col cols="12" md="4" sm="6">
                                    <v-text-field v-model="ktp.perkerjaan" label="Pekerjaan" placeholder="Pekerjaan"
                                        variant="underlined"></v-text-field>
                                </v-col>
                                <v-col cols="12" md="4" sm="6">
                                    <v-text-field v-model="ktp.kewarganegaraan" label="Kewarganegaraan"
                                        placeholder="Kewarganegaraan" variant="underlined"></v-text-field>
                                </v-col>
                            </v-row>
                        </v-container>
                        <small class="text-caption text-medium-emphasis d-flex justify-space-between align-center">
                            <v-col></v-col>
                            <v-col cols="1" md="2" sm="4">
                                <router-link to="/"><v-btn rounded="" block>Cancel</v-btn></router-link>
                            </v-col>
                            <v-col cols="3" md="2" sm="4">
                                <v-btn @click="postKTP" rounded="" block>Save</v-btn>
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
            ktp: {},
            // kartu_keluarga_id: null,
        }
    },

    created() {

    },
    mounted() {
        // this.postKk();
    },
    methods: {
        postKTP() {
            const self = this;
            const kartu_keluarga = self.$route.params.id;

            console.log(kartu_keluarga)


            const userData = {
                // name: state.name,
                // job: state.job
                nik: this.ktp.nik,
                nama: this.ktp.nama,
                tempat: this.ktp.tempat,
                tanggal_lahir: this.ktp.tanggal_lahir,
                jenis_kelamin: this.ktp.jenis_kelamin,
                gol_darah: this.ktp.gol_darah,
                alamat: this.ktp.alamat,
                rt_rw: this.ktp.rt_rw,
                desa_kelurahan: this.ktp.desa_kelurahan,
                kecamatan: this.ktp.kecamatan,
                agama: this.ktp.agama,
                status_perkawinan: this.ktp.status_perkawinan,
                perkerjaan: this.ktp.perkerjaan,
                kewarganegaraan: this.ktp.kewarganegaraan,
                kartu_keluarga_id: kartu_keluarga
            };
            axios
                .post("http://127.0.0.1:8000/api/ktp", userData)
                .then(function (response) {
                    console.log(kartu_keluarga)
                    self.$router.back(-1)
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
