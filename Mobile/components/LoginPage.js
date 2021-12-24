import React, { useState } from "react";
import {
    StyleSheet,
    Text,
    Image,
    View,
    TextInput,
    TouchableOpacity,
} from "react-native";
import { loginUser } from "../helpers/users";
import logoCharlie from "../assets/logoCharlie.png";

const Login = ({ navigation }) => {
    const [Login, setLogin] = useState("");
    const [Password, setPassword] = useState("");

    const changeLogin = ({ target }) => {
        setLogin(target.value);
    };

    const changePassword = ({ target }) => {
        setPassword(target.value);
    };

    const loginAction = async () => {
        const response = await loginUser({
            login: Login,
            senha: Password,
        });

        if (response.usuarioEncontrado) {
            let email = response.usuario.US_EMAIL;
            navigation.navigate("Profile", {
                email: email,
            });
        } else {
            alert("Login ou senha incorretos");
        }

        return;
    };

    const signupAction = () => {
        navigation.navigate("Signup");
    };

    return (
        <View style={styles.container}>
            <View style={styles.logoCharlie}>
                <Image source={logoCharlie} style={styles.logo} />
            </View>
            <View style={styles.inputView}>
                <TextInput
                    style={styles.inputText}
                    placeholder="Login..."
                    placeholderTextColor="#003f5c"
                    value={Login}
                    onChange={changeLogin}
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
            <TouchableOpacity>
                <Text style={styles.forgot}>Forgot Password?</Text>
            </TouchableOpacity>
            <TouchableOpacity onPress={loginAction} style={styles.loginBtn}>
                <Text style={styles.loginText}>Login</Text>
            </TouchableOpacity>
            <TouchableOpacity onPress={signupAction}>
                <Text style={styles.loginText}>Signup</Text>
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
    },
    logo: {
        fontWeight: "bold",
        fontSize: 50,
        color: "white",
        marginBottom: 40,
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
    loginBtn: {
        width: "80%",
        backgroundColor: "#1dcdfe",
        borderRadius: 25,
        height: 50,
        alignItems: "center",
        justifyContent: "center",
        marginTop: 40,
        marginBottom: 10,
    },
    loginText: {
        color: "white",
    },
    logoCharlie: {
        justifyContent: "center",
        alignItems: "center",
        marginBottom: 20,
    },
    logo: {
        width: 300,
        height: 60,
    },
});

export default Login;
