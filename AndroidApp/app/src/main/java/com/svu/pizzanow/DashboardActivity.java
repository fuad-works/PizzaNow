package com.svu.pizzanow;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;

public class DashboardActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_dashboard);

        SharedPreferences prefs = getBaseContext().getSharedPreferences("prefs", Context.MODE_PRIVATE);
        int user_id = prefs.getInt("id", 0);
        if (user_id <= 0) {
            Intent i = new Intent(this, LoginActivity.class);
            startActivity(i);
        }
    }

    @Override
    protected void onResume() {
        super.onResume();


        SharedPreferences prefs = getBaseContext().getSharedPreferences("prefs", Context.MODE_PRIVATE);
        int user_id = prefs.getInt("id", 0);
        if (user_id <= 0) {
            Intent i = new Intent(this, LoginActivity.class);
            startActivity(i);
        }

    }

    public void goProducts(View v)
    {
        Intent i = new Intent(this,ProductsActivity.class);
        startActivity(i);
    }

    public void goCart(View v)
    {
        Intent i = new Intent(this,CartActivity.class);
        startActivity(i);
    }

    public void goOrders(View v)
    {
        Intent i = new Intent(this,OrdersActivity.class);
        startActivity(i);
    }

    public void logOut(View v){

        Context context = this;
        new AlertDialog.Builder(this)
                .setTitle("تسجيل الخروج")
                .setMessage("هل أنت متأكد من تسجيل الخروج؟")
                .setPositiveButton("نعم", new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int which) {

                        SharedPreferences prefs = getBaseContext().getSharedPreferences("prefs", Context.MODE_PRIVATE);
                        SharedPreferences.Editor ed = prefs.edit();
                        ed.remove("token");
                        ed.remove("name");
                        ed.remove("user_name");
                        ed.remove("password");
                        ed.putInt("id", -1);
                        ed.commit();
                        ed.apply();

                        Intent i = new Intent(context, LoginActivity.class);
                        startActivity(i);

                    }
                })
                .setNegativeButton("لا", new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int which) {
                        // do nothing
                    }
                })
                .setIcon(R.drawable.ic_baseline_warning_24)
                .show();
    }


}