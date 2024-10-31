import ktp from "../js/components/ktp.vue";
import kk from "../js/components/kk.vue";
import tambahdatakk from "./components/tambahdatakk.vue";
import tambahdataktp from "./components/tambahdataktp.vue";
import detail from "../js/components/detail.vue";
import detailktp from "../js/components/detailktp.vue";
import editdatakk from "../js/components/editdatakk.vue";
import editdataktp from "../js/components/editdataktp.vue";
import test from "../js/components/test.vue";
import { createRouter, createWebHistory } from "vue-router";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: "/",
            name: "kk",
            component: kk,
        },
        {
            path: "/ktp",
            name: "ktp",
            component: ktp,
        },
        {
            path: "/tambahdatakk",
            name: "tambahdatakk",
            component: tambahdatakk,
        },
        {
            path: "/detail/:id",
            name: "detail",
            component: detail,
        },
        {
            path: "/detailktp/:id",
            name: "detailktp",
            component: detailktp,
        },
        {
            path: "/tambahdataktp/:id",
            name: "tambahdataktp",
            component: tambahdataktp,
        },
        {
            path: "/test",
            name: "test",
            component: test,
        },
        {
            path: "/editdatakk/:id",
            name: "editdatakk",
            component: editdatakk,
        },
        {
            path: "/editdataktp/:id",
            name: "editdataktp",
            component: editdataktp,
        },
    ],
});

export default router;
