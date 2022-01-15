package com.svu.pizzanow.Adapters;

import android.content.Context;
import android.content.DialogInterface;
import android.graphics.Color;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AlertDialog;
import androidx.recyclerview.widget.RecyclerView;

import com.squareup.picasso.Picasso;
import com.svu.pizzanow.Models.Product;
import com.svu.pizzanow.R;

import java.util.List;

public class ProductAdapter  extends RecyclerView.Adapter<ProductAdapter.ViewHolderIndex> {

    private Context context;
    private List<Product> items;
    private final ProductAdapter.OnItemClickListener listener;

    public interface OnItemClickListener {
        void onItemBtn(Product item);
    }

    public ProductAdapter(Context context, ProductAdapter.OnItemClickListener listener, List<Product> items) {
        this.context = context;
        this.items = items;
        this.listener = listener;
    }

    @NonNull
    @Override
    public ProductAdapter.ViewHolderIndex onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View myViewInflater = LayoutInflater.from(context).inflate(R.layout.item_product, parent, false);
        return new ProductAdapter.ViewHolderIndex(myViewInflater);
    }

    @Override
    public void onBindViewHolder(@NonNull ProductAdapter.ViewHolderIndex holder, int position) {
        Product item = items.get(position);
        holder.item = item;
        holder.txt_name.setText(item.getName());
        holder.txt_desc.setText(item.getDescription());
        holder.txt_price.setText(item.getPrice() + " ل.س");

        Picasso.get()
                .load(context.getString(R.string.base_url ) + "/assets/images/uploads/" + item.getImage())
                .placeholder(R.drawable.ic_launcher_foreground)
                .error(R.drawable.ic_launcher_foreground)
                .into(holder.product_image);

        holder.bind(item,listener);
    }

    @Override
    public int getItemCount() {
        return items.size();
    }


    public class ViewHolderIndex extends RecyclerView.ViewHolder {

        Product item;

        TextView txt_name,txt_desc,txt_price;
        ImageView product_image,btn1;

        public ViewHolderIndex(View itemView) {
            super(itemView);
            txt_name = itemView.findViewById(R.id.txt_name);
            txt_desc = itemView.findViewById(R.id.txt_desc);
            txt_price = itemView.findViewById(R.id.txt_price);

            product_image = itemView.findViewById(R.id.img_prod);
            btn1 = itemView.findViewById(R.id.btn_action);

        }

        public void bind(final Product item, final OnItemClickListener listener) {

            itemView.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                }
            });

            btn1.setOnClickListener(new View.OnClickListener() {
                @Override public void onClick(View v) {
                    listener.onItemBtn(item);
                }
            });

        }

    }

}
