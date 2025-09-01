<script setup>
defineProps({
    form: Object,
});

// https://velog.io/@kimju0913/Vue.js-%EB%82%A0%EC%A7%9C-%ED%8F%AC%EB%A7%B7-%EB%B3%80%ED%99%98-yyyyMMdd
const yyyyMMdd = (value) => {
    // 들어오는 value 값이 공백이면 그냥 공백으로 돌려줌
    if (value == "") return "";

    // 현재 Date 혹은 DateTime 데이터를 javaScript date 타입화
    var js_date = new Date(value);

    // 연도, 월, 일 추출
    var year = js_date.getFullYear();
    var month = js_date.getMonth() + 1;
    var day = js_date.getDate();

    // 월, 일의 경우 한자리 수 값이 있기 때문에 공백에 0 처리
    if (month < 10) {
        month = "0" + month;
    }

    if (day < 10) {
        day = "0" + day;
    }

    // 최종 포맷 (ex - '2021-10-08')
    return year + "-" + month + "-" + day;
};
</script>
<!-- https://tailwindflex.com/@shakti/invoice-template -->
<template>
    <div class="bg-white rounded-lg px-6 py-8 max-w-md mx-auto mt-8">
        <h1 class="font-bold text-2xl my-4 text-center text-primary">
            체험학습 예약하기
        </h1>
        <hr class="mb-2" />
        <div class="flex justify-between mb-4">
            <h1 class="text-md font-bold">예약일자 :</h1>
            <div class="text-gray-700">
                <div>
                    {{ yyyyMMdd(form.bookingDate) }}
                </div>
            </div>
        </div>
        <table class="w-full mb-8">
            <thead>
                <tr>
                    <th class="text-left text-md">인원선택 :</th>
                    <th class="text-right text-gray-700">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-left text-gray-700">어른</td>
                    <td class="text-right text-gray-700">
                        {{ form.numberAdult }}
                    </td>
                </tr>
                <tr>
                    <td class="text-left text-gray-700">청소년</td>
                    <td class="text-right text-gray-700">
                        {{ form.numberTeenager }}
                    </td>
                </tr>
                <tr>
                    <td class="text-left text-gray-700">어린이</td>
                    <td class="text-right text-gray-700">
                        {{ form.numberChild }}
                    </td>
                </tr>
            </tbody>
            <!-- <tfoot>
                <tr>
                    <td class="text-left font-bold text-gray-700">총</td>
                    <td class="text-right font-bold text-gray-700">
                        {{
                            form.numberAdult +
                            form.numberTeenager +
                            form.numberChild
                        }}
                    </td>
                </tr>
            </tfoot> -->
        </table>
        <div class="flex justify-between mb-4">
            <h1 class="text-md font-bold">이름 :</h1>
            <div class="text-gray-700">
                <div>
                    {{ form.name }}
                </div>
            </div>
        </div>
        <div class="flex justify-between mb-4">
            <h1 class="text-md font-bold">연락처 :</h1>
            <div class="text-gray-700">
                <div>
                    {{ form.contact }}
                </div>
            </div>
        </div>
        <div class="flex justify-between mb-4">
            <h1 class="text-md font-bold">Email :</h1>
            <div class="text-gray-700">
                <div>
                    {{ form.email }}
                </div>
            </div>
        </div>
        <div v-if="form.image != null" class="flex justify-between mb-4">
            <h1 class="text-md font-bold">세금계산서 발행용 :</h1>
            <div class="text-gray-700">
                <div>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="size-5 text-green-600"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                        />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</template>
