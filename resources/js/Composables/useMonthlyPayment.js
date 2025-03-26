import { computed, isRef } from 'vue';

export const useMonthlyPayment = (total, interestRate, duration) => {
    const monthlyPayment = computed(() => {
        const principle = isRef(total) ? total.value : total;
        const monthlyInterestRate = (isRef(interestRate) ? interestRate.value : interestRate) / 100 / 12;
        const numberOfPayments = (isRef(duration) ? duration.value : duration) * 12;

        return principle * monthlyInterestRate / (1 - Math.pow(1 + monthlyInterestRate, -numberOfPayments));
    })

    const totalPaid = computed(() => {
        return (isRef(duration) ? duration.value : duration) * 12 * monthlyPayment.value;
    })

    const totalInterest = computed(() => {
        return totalPaid.value - (isRef(total) ? total.value : total);
    })

    return { monthlyPayment, totalPaid, totalInterest };
}