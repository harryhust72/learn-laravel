export async function executeService(serviceFunc, ...params) {
    try {
        const result = await serviceFunc(...params);
        return result;
    } catch (error) {
        if (error.status === 422) {
            return {
                status: "error",
                type: "validation",
                errors: error.responseJSON.errors || {},
            };
        }
        console.log(error)
        return {
            status: "error",
        };
    }
}

export function priceToVnd(price) {
    const numPrice = Number(price);
    if (price === null || price === undefined || isNaN(numPrice)) {
        return "0 ₫";
    }

    return numPrice.toLocaleString("vi-VN") + " ₫";
}
