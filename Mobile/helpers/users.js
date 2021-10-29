const makeHeaders = () => {
    const myHeaders = new Headers();

    myHeaders.append("Content-Type", "application/json");

    return myHeaders;
};

const createUser = async (data) => {
    const response = await fetch(`http://localhost:8001/api/register`, {
        method: "POST",
        body: JSON.stringify(data),
        headers: makeHeaders(),
    });

    return response.ok;
};

const loginUser = async (data) => {
    const response = await fetch(`http://localhost:8001/api/loginMobile`, {
        method: "POST",
        body: JSON.stringify(data),
        headers: makeHeaders(),
    }).then((res) => res.json());

    console.log(response);

    return response;
};

export { createUser, loginUser };
