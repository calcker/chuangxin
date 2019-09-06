<template>
    <div class="district">
        <el-cascader size="large" :options="options" v-model="selectedOptions" @change="handleChange">
        </el-cascader>
    </div>
</template>

<script>
    import { provinceAndCityData } from 'element-china-area-data'
    export default {
        data () {
            return {
                options: provinceAndCityData,
                selectedOptions: []
            }
        },
        methods: {
            handleChange (value) {
                var ctt = CodeToText[value[0]] + CodeToText[value[1]]
                console.log(ctt)
            }
        },
        components: {
            provinceAndCityData
        }
    }
</script>
