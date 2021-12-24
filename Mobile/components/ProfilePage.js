import React, { Component } from "react";
import PropTypes from "prop-types";
import { StyleSheet, View, Text, Image } from "react-native";

import logoImg from "../assets/profile-user.png";
import logoCharlie from "../assets/logoCharlie.png";
import curso from "../assets/img1.jpg";
import logoMenu from "../assets/menu.png";

const ProfilePage = ({ navigation, route }) => {
    return (
        <View style={styles.container}>
            <View style={styles.menu}>
                <Image source={logoMenu} style={styles.imageMenu} />
            </View>
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
        backgroundColor: "#141442",
    },
    logoCharlie: {
        justifyContent: "center",
        alignItems: "center",
        marginTop: "10%",
    },
    footer: {
        paddingTop: 20,
        borderTopWidth: 1,
        justifyContent: "center",
        alignItems: "center",
        backgroundColor: "#141442",
    },
    cursos: {
        display: "flex",
        paddingTop: 70,
        position: "relative",
        justifyContent: "center",
        alignItems: "center",
        backgroundColor: "#141442",
    },
    cursosPb: {
        display: "flex",
        paddingTop: 50,
        position: "relative",
        justifyContent: "center",
        alignItems: "center",
        paddingBottom: 30,
        backgroundColor: "#141442",
    },
    user: {
        marginLeft: "auto",
        top: 0,
        justifyContent: "center",
        alignItems: "center",
        marginTop: "10px",
        marginRight: "10px",
    },
    menu: {
        marginRight: "auto",
        position: "absolute",
        top: 0,
        justifyContent: "center",
        alignItems: "center",
        marginTop: "10px",
        marginRight: "10px",
    },
    image: {
        width: 40,
        height: 40,
    },
    imageMenu: {
        width: 40,
        height: 40,
        marginLeft: 5,
    },
    logo: {
        width: 300,
        height: 60,
    },
    text: {
        color: "white",
        fontWeight: "bold",
        backgroundColor: "transparent",
        marginTop: 10,
    },

    cursoText: {
        color: "white",
        fontSize: 20,
        fontWeight: "bold",
        backgroundColor: "transparent",
        marginBottom: 20,
    },
    cursoImage: {
        width: 430,
        height: 250,
    },
});

export default ProfilePage;
