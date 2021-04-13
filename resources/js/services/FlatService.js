import axios from "axios";
const apiUrl = "/api/flat";
const getFlats = async (form) => {
    let queryString = "";

    if (form) {
        let mform = {...form};
        let priceRange = [...mform.price];
        delete mform.price;

        queryString =
            `?searchJoin=and&search=` +
            Object.keys(mform)
                .map((key) => (mform[key] ? `${key}:${mform[key]}` : ""))
                .filter((val) => val)
                .join(";");

        if (priceRange[1] > 0) queryString += `price:${priceRange.join(",")}`;
    }

    let response = await axios.get(apiUrl + queryString);
    return response.data;
};
export default getFlats;
