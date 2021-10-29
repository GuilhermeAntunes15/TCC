import React, { Component } from "react";
import PropTypes from "prop-types";
import { StyleSheet, View, Text, Image } from "react-native";

import logoImg from "../assets/logo.png";
import logoCharlie from "../assets/logoCharlie.png";
import curso from "../assets/img1.jpg";

const ProfilePage = ({ navigation, route }) => {
    return (
        <View style={styles.container}>
            <View style={styles.user}>
                <Image source={logoImg} style={styles.image} />
                <Text style={styles.text}>{route.params.email}</Text>
            </View>
            <View style={styles.logoCharlie}>
                <Image source={logoCharlie} style={styles.logo} />
            </View>

            <View style={styles.cursos}>
                <Text style={styles.cursoText}>Curso 1</Text>
                <Image source={curso} style={styles.cursoImage} />
            </View>
            <View style={styles.cursosPb}>
                <Text style={styles.cursoText}>Curso 2</Text>
                <Image source={curso} style={styles.cursoImage} />
            </View>

            <View style={styles.footer}>
                <Text style={styles.cursoText}>TCC@2021</Text>
            </View>
        </View>
    );
};

const styles = StyleSheet.create({
    container: {
        flex: 1,
        width: "100%",
        height: "100%",
        display: "flex",
        backgroundColor: "#002A45",
    },
    logoCharlie: {
        justifyContent: "center",
        alignItems: "center",
    },
    footer: {
        paddingTop: 20,
        borderTopWidth: 1,
        justifyContent: "center",
        alignItems: "center",
        backgroundColor: "#002A45",
    },
    cursos: {
        display: "flex",
        paddingTop: 70,
        position: "relative",
        justifyContent: "center",
        alignItems: "center",
        backgroundColor: "#002A45",
    },
    cursosPb: {
        display: "flex",
        paddingTop: 50,
        position: "relative",
        justifyContent: "center",
        alignItems: "center",
        paddingBottom: 30,
        backgroundColor: "#002A45",
    },
    user: {
        marginLeft: "auto",
        top: 0,
        justifyContent: "center",
        alignItems: "center",
        marginTop: "10px",
        marginRight: "10px",
    },
    image: {
        width: 80,
        height: 80,
    },
    logo: {
        width: 500,
        height: 70,
    },
    text: {
        color: "white",
        fontWeight: "bold",
        backgroundColor: "transparent",
        marginTop: 20,
    },

    cursoText: {
        color: "white",
        fontSize: 20,
        fontWeight: "bold",
        backgroundColor: "transparent",
        marginBottom: 20,
    },
    cursoImage: {
        width: 500,
        height: 250,
    },
});

export default ProfilePage;
