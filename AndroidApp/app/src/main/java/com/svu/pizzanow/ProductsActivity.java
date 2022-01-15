package com.svu.pizzanow;

import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;
import androidx.core.content.ContextCompat;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.Manifest;
import android.app.Dialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.pm.PackageManager;
import android.os.Bundle;
import android.view.View;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.Toast;

import com.svu.pizzanow.Adapters.ProductAdapter;
import com.svu.pizzanow.DataBase.RoomDB;
import com.svu.pizzanow.Models.Cart;
import com.svu.pizzanow.Models.Product;

import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.util.List;

public class ProductsActivity extends AppCompatActivity {

    RecyclerView rv;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_products);
        rv = findViewById(R.id.rv);
        LoadData();
    }

    public void cancel(View v) {
        finish();
    }

    Context context = this;

    private void LoadData() {
        RoomDB roomDB = RoomDB.getInstance(this);
        List<Product> items = roomDB.product_dao().get_all();

        ProductAdapter adapter = new ProductAdapter(this, new ProductAdapter.OnItemClickListener() {


            @Override
            public void onItemBtn(Product item) {
                //On add button, show dialog to customize
                Dialog dialog = new Dialog(context);
                dialog.setContentView(R.layout.dialog_customize);
                int width = WindowManager.LayoutParams.MATCH_PARENT;
                int height = WindowManager.LayoutParams.WRAP_CONTENT;
                dialog.getWindow().setLayout(width, height);
                dialog.show();

                EditText edit_todo_text = dialog.findViewById(R.id.ed_text_box);
                //edit_todo_text.setText(item.getName());
                Button btn_update = dialog.findViewById(R.id.btn_set);
                Button btn_cancel = dialog.findViewById(R.id.btn_cancel);
                ImageView btn_close = dialog.findViewById(R.id.btn_close);

                btn_close.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View v) {
                        dialog.dismiss();
                    }
                });

                btn_cancel.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View v) {
                        dialog.dismiss();
                    }
                });

                btn_update.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View v) {
                        dialog.dismiss();

                        String todo = edit_todo_text.getText().toString().trim();
                        Cart cart = new Cart();
                        cart.setCustomize(edit_todo_text.getText().toString());
                        cart.setProduct_id(item.getId());
                        cart.setQuantity(1);

                        roomDB.cart_dao().add_new(cart);
                        Toast.makeText(context, "تم الإضافة إلى السلة بنجاح", Toast.LENGTH_LONG).show();
                       // adapter.nonotifyDataSetChanged();
                    }
                });

                //then add it to Cart

            }
        },items);

        rv.setAdapter(adapter);

        RecyclerView.LayoutManager layoutManager;

        layoutManager = new GridLayoutManager(getBaseContext(), 1);

        rv.setLayoutManager(layoutManager);

    }
}