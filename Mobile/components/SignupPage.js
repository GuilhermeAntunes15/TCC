import React, { useState } from "react";
import {
    StyleSheet,
    Text,
    View,
    TextInput,
    TouchableOpacity,
} from "react-native";

import { createUser } from "../helpers/users";

const Signup = ({ navigation }) => {
    const [Email, setEmail] = useState("");
    const [Password, setPassword] = useState("");
    const [Usuario, setUsuario] = useState("");
    const [DataNasc, setDataNasc] = useState(null);
    const [Nome, setNome] = useState("");

    const changeEmail = ({ target }) => {
        setEmail(target.value);
    };

    const changeNome = ({ target }) => {
        setNome(target.value);
    };

    const changeDataNasc = ({ target }) => {
        let data = mask(target.value);
        setDataNasc(data);
    };

    const changeUsuario = ({ target }) => {
        setUsuario(target.value);
    };

    const changePassword = ({ target }) => {
        setPassword(target.value);
    };

    const signupAction = async () => {
        // formatar data
        let data = DataNasc.split("/");
        let dataFormatada = `${data[2]}-${data[1]}-${data[0]}`;

        const response = await createUser({
            login: Usuario,
            nome: Nome,
            email: Email,
            senha: Password,
            dt_nasc: dataFormatada,
            dsAuditoria: "Usuario criado pelo app",
        });

        if (response) {
            setEmail("");
            setNome("");
            setDataNasc("");
            setUsuario("");
            setPassword("");
            navigation.navigate("Login");
        } else {
            alert("Invalid Fields");
        }

        return;
    };

    // mascara regex para data
    const mask = (rawValue) => {
        let value = rawValue.toString();
        let mask = "##/##/####";
        let i = 0;
        let rawValueLength = rawValue.length;
        let maskLength = mask.length;
        let result = "";

        if (rawValueLength > maskLength) {
            return value;
        }

        for (i = 0; i < rawValueLength; i++) {
            if (mask[i] === "#") {
                result += value[i];
            } else {
                result += mask[i];
            }
        }

        return result;
    };

    return (
        <View style={styles.container}>
            <Text style={styles.logo}>Charlie</Text>
            <View style={styles.inputView}>
                <TextInput
                    style={styles.inputText}
                    placeholder="Nome..."
                    placeholderTextColor="#003f5c"
                    value={Nome}
                    onChange={changeNome}
                />
            </View>
            <View style={styles.inputView}>
                <TextInput
                    style={styles.inputText}
                    placeholder="Usuario..."
                    placeholderTextColor="#003f5c"
                    value={Usuario}
                    onChange={changeUsuario}
                />
            </View>
            <View style={styles.inputView}>
                <TextInput
                    style={styles.inputText}
                    placeholder="Data Nasc..."
                    placeholderTextColor="#003f5c"
                    value={DataNasc}
                    maxLength={10}
                    onChange={changeDataNasc}
                />
            </View>
            <View style={styles.inputView}>
                <TextInput
                    style={styles.inputText}
                    placeholder="Email..."
                    placeholderTextColor="#003f5c"
                    value={Email}
                    onChange={changeEmail}
                />
            </View>
            <View style={styles.inputView}>
                <TextInput
                    secureTextEntry
                    style={styles.inputText}
                    placeholder="Password..."
                    placeholderTextColor="#003f5c"
                    value={Password}
                    onChange={changePassword}
                />
            </View>
            <TouchableOpacity onPress={signupAction} style={styles.signupBtn}>
                <Text style={styles.loginText}>Signup</Text>
            </TouchableOpacity>
            <TouchableOpacity>
                <Text style={styles.loginText}>Login</Text>
            </TouchableOpacity>
        </View>
    );
};

const styles = StyleSheet.create({
    container: {
        flex: 1,
        backgroundColor: "#141442",
        alignItems: "center",
        justifyContent: "center",
        height: "100%",
    },
    logo: {
        fontWeight: "bold",
        fontSize: 50,
        color: "white",
        marginBottom: 30,
    },
    inputView: {
        width: "80%",
        backgroundColor: "#465881",
        borderRadius: 25,
        height: 50,
        marginBottom: 20,
        justifyContent: "center",
        padding: 20,
    },
    inputText: {
        height: 50,
        color: "white",
    },
    forgot: {
        color: "white",
        fontSize: 11,
    },
    signupBtn: {
        width: "80%",
        backgroundColor: "#1dcdfe",
        borderRadius: 25,
        height: 50,
        alignItems: "center",
        justifyContent: "center",
        marginTop: 10,
        marginBottom: 10,
    },
    loginText: {
        color: "white",
    },
});

export default Signup;
