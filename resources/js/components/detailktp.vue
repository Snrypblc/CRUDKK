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
                        value="Data"></v-list-item></router-link>
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
                <v-card border="opacity-50 sm" class="mx-auto" max-width="1200" rounded="xl" variant="text">
                    <template v-slot:title>
                        <div class="mb-5text-caption font-weight-bold ">Kartu Tanda Penduduk</div>
                    </template>

                    <template v-slot:text>
                        <v-container>
                            <v-row>
                                <v-col cols="12" md="4" sm="6">
                                    <v-text-field readonly v-model="detailktp.nik" label="NIK" placeholder="NIK"
                                        variant="underlined"></v-text-field>
                                </v-col>
                                <v-col cols="12" md="4" sm="6">
                                    <v-text-field readonly v-model="detailktp.nama" label="Nama" placeholder="Nama"
                                        variant="underlined"></v-text-field>
                                </v-col>
                                <v-col cols="12" md="4" sm="6">
                                    <v-text-field readonly v-model="detailktp.tempat" label="Tempat"
                                        placeholder="Tempat/Tgl Lahir" variant="underlined"></v-text-field>
                                </v-col>
                                <v-col cols="12" md="4" sm="6">
                                    <v-text-field readonly v-model="detailktp.tanggal_lahir" label="Tgl Lahir"
                                        placeholder="Tempat/Tgl Lahir" variant="underlined"></v-text-field>
                                </v-col>
                                <v-col cols="12" md="4" sm="6">
                                    <v-text-field readonly v-model="detailktp.jenis_kelamin" label="Jenis Kelamin"
                                        placeholder="Jenis Kelamin" variant="underlined"></v-text-field>
                                </v-col><v-col cols="12" md="4" sm="6">
                                    <v-text-field readonly v-model="detailktp.gol_darah" label="Gol Darah"
                                        placeholder="Gol Darah" variant="underlined"></v-text-field>
                                </v-col><v-col cols="12" md="4" sm="6">
                                    <v-text-field readonly v-model="detailktp.alamat" label="Alamat"
                                        placeholder="Alamat" variant="underlined"></v-text-field>
                                </v-col><v-col cols="12" md="4" sm="6">
                                    <v-text-field readonly v-model="detailktp.rt_rw" label="RT/RW" placeholder="RT/RW"
                                        variant="underlined"></v-text-field>
                                </v-col><v-col cols="12" md="4" sm="6">
                                    <v-text-field readonly v-model="detailktp.desa_kelurahan" label="Desa/Kelurahan"
                                        placeholder="Desa/Keelurahan" variant="underlined"></v-text-field>
                                </v-col><v-col cols="12" md="4" sm="6">
                                    <v-text-field readonly v-model="detailktp.kecamatan" label="Kecamatan"
                                        placeholder="Kecamatan" variant="underlined"></v-text-field>
                                </v-col><v-col cols="12" md="4" sm="6">
                                    <v-text-field readonly v-model="detailktp.agama" label="Agama" placeholder="Agama"
                                        variant="underlined"></v-text-field>
                                </v-col><v-col cols="12" md="4" sm="6">
                                    <v-text-field readonly v-model="detailktp.status_perkawinan"
                                        label="Status Perkawinan" placeholder="Status Perkawinan"
                                        variant="underlined"></v-text-field>
                                </v-col>

                                <v-col cols="12" md="4" sm="6">
                                    <v-text-field readonly v-model="detailktp.perkerjaan" label="Pekerjaan"
                                        placeholder="Pekerjaan" variant="underlined"></v-text-field>
                                </v-col>
                                <v-col cols="12" md="4" sm="6">
                                    <v-text-field readonly v-model="detailktp.kewarganegaraan" label="Kewarganegaraan"
                                        placeholder="Kewarganegaraan" variant="underlined"></v-text-field>
                                </v-col>
                            </v-row>
                        </v-container>
                        <small class="text-caption text-medium-emphasis d-flex justify-space-between align-center">
                            <v-col cols="3" md="2" sm="4">
                                <v-btn rounded="" @click="this.$router.back(-1)" block>Back</v-btn>
                            </v-col>
                            <v-col></v-col>
                            <v-col cols="3" md="2" sm="4">
                                <router-link :to="'/editdataktp/' + this.detailktp.id"><v-btn rounded=""
                                        block>Edit</v-btn></router-link>
                            </v-col>
                        </small>
                    </template>
                </v-card>


            </v-container>

        </v-main>



    </v-layout>
</template>

<script>

export default {
    data() {
        return {
            id: null,
            dialog: false,
            dialogDelete: false,
            headers: [
                { title: 'No', align: 'start', key: 'id' },
                { title: 'NoKK', key: 'no_kk' },
                { title: 'Nama Kepala Keluarga', key: 'nama' },
                { title: 'Alamat', key: 'alamat' },
                { title: 'Kecamatan', key: 'kecamatan' },
                { title: 'Kabupaten/Kota', key: 'kabupaten_kota' },
                { title: 'Kode Pos', key: 'kode_pos' },
                { title: 'Provinsi', key: 'provinsi' },
                { title: 'Actions', key: 'actions' },
            ],
            desserts: [],
            editedIndex: -1,
            editedItem: {
                nokk: '',
                nama: '',
                alamat: '',
            },
            defaultItem: {
                nokk: '',
                nama: '',
                alamat: '',
            },
            detailktp: [],
            editable: false
        }
    },


    computed: {
        formTitle() {
            return this.editedIndex === -1 ? 'Tambah  Data' : 'Edit Item';
        },
    },

    created() {
    },
    mounted() {
        this.getdetailKtp();
    },
    methods: {
        getdetailKtp() {
            const self = this;
            self.id = this.$route.params.id
            axios({
                method: 'get',
                url: 'http://127.0.0.1:8000/api/ktp/' + self.id,
                headers: {
                    Accept: 'application/json'
                }
            })
                .then(function (response) {
                    console.log("ini respo", response);
                    self.detailktp = response.data[0];
                });
        },

        editItem(item) {
            // this.editedIndex = this.desserts.indexOf(item);
            // this.editedItem = Object.assign({}, item);
            // this.dialog = true;
            this.$router.push(this.$route.path + "detail/" + item.id)
        },

        deleteItem(item) {
            this.editedIndex = this.desserts.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.dialogDelete = true;
        },

        deleteItemConfirm() {
            this.desserts.splice(this.editedIndex, 1);
            this.updateItemNumbers();
            this.closeDelete();
        },

        close() {
            this.dialog = false;
            this.$nextTick(() => {
                this.editedItem = Object.assign({}, this.defaultItem);
                this.editedIndex = -1;
            });
        },

        closeDelete() {
            this.dialogDelete = false;
            this.$nextTick(() => {
                this.editedItem = Object.assign({}, this.defaultItem);
                this.editedIndex = -1;
            });
        },

        save() {
            if (this.editedIndex > -1) {
                // Update item if editing
                Object.assign(this.desserts[this.editedIndex], this.editedItem);
            } else {
                // Add a new item with automatic numbering
                const newItem = { ...this.editedItem, no: String(this.desserts.length + 1) };
                this.desserts.push(newItem);
            }
            this.updateItemNumbers();
            this.close();
        },

        updateItemNumbers() {
            // Update all items' `no` based on their index
            this.desserts.forEach((item, index) => {
                item.no = String(index + 1);
            });
        },
    },
};
</script>
