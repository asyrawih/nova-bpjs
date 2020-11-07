<template>
  <div class="bpjs">
    <div v-if="!patient[0]">Loading ... </div>
    <div class="fi" v-if="patient[0]">
      <div class="px-6 py-3">
        <CustomeField name="Nama" :value="patient[0].name" />
        <CustomeField name="Peserta" :value="patient[0].jenis_peserta" />
        <CustomeField name="Hak Kelas" :value="patient[0].hak_kelas" />
        <CustomeField name="NO KARTU" :value="patient[0].noKartu" />
        <CustomeField
          name="Status Peserta"
          :value="patient[0].status_peserta"
        />
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import CustomeField from "./CustomField";
export default {
  props: ["resourceName", "resourceId", "field"],
  components: {
    CustomeField
  },
  data() {
    return {
      patient: []
    };
  },
  mounted() {
    axios
      .get(`/nova-api/${this.resourceName}/` + this.resourceId)
      .then(({ data }) => {
        const nik = data.resource.fields[3].value;
        this.getPeserta(nik).then(({ data }) => {
          this.patient.push(data);
        });
      });
  },
  methods: {
    async getPeserta(nik) {
      const tgl = new Date().toISOString().slice(0, 10);
      const res = axios.post("/api/bpjs/peserta", {
        nik: nik,
        sep: tgl
      });
      return res;
    }
  }
};
</script>
