package com.svu.pizzanow.Adapters;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.squareup.picasso.Picasso;
import com.svu.pizzanow.DataBase.RoomDB;
import com.svu.pizzanow.Models.Cart;
import com.svu.pizzanow.Models.Product;
import com.svu.pizzanow.R;

import java.util.List;

public class CartAdapter extends RecyclerView.Adapter<CartAdapter.ViewHolderIndex>{
    private Context context;
    private List<Cart> items;
    private final CartAdapter.OnItemClickListener listener;

    public interface OnItemClickListener {
        void onItemBtn(Cart item);
    }

    public CartAdapter(Context context, CartAdapter.OnItemClickListener listener, List<Cart> items) {
        this.context = context;
        this.items = items;
        this.listener = listener;
    }

    @NonNull
    @Override
    public CartAdapter.ViewHolderIndex onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View myViewInflater = LayoutInflater.from(context).inflate(R.layout.item_cart, parent, false);
        return new CartAdapter.ViewHolderIndex(myViewInflater);
    }

    @Override
    public void onBindViewHolder(@NonNull CartAdapter.ViewHolderIndex holder, int position) {
        RoomDB roomDB = RoomDB.getInstance(context);
        Cart item = items.get(position);
        Product product = roomDB.product_dao().get_by_id(item.getProduct_id());

        holder.item = item;
        holder.txt_name.setText(product.getName());
        holder.txt_desc.setText(item.getCustomize());
        holder.txt_price.setText(product.getPrice() + " ل.س");

        Picasso.get()
                .load(context.getString(R.string.base_url ) + "/assets/images/uploads/" + product.getImage())
                .placeholder(R.drawable.ic_launcher_foreground)
                .error(R.drawable.ic_launcher_foreground)
                .into(holder.Cart_image);

        holder.bind(item,listener);
    }

    @Override
    public int getItemCount() {
        return items.size();
    }


    public class ViewHolderIndex extends RecyclerView.ViewHolder {

        Cart item;

        TextView txt_name,txt_desc,txt_price;
        ImageView Cart_image,btn1;

        public ViewHolderIndex(View itemView) {
            super(itemView);
            txt_name = itemView.findViewById(R.id.txt_name);
            txt_desc = itemView.findViewById(R.id.txt_desc);
            txt_price = itemView.findViewById(R.id.txt_price);

            Cart_image = itemView.findViewById(R.id.img_prod);
            btn1 = itemView.findViewById(R.id.btn_action);

        }

        public void bind(final Cart item, final CartAdapter.OnItemClickListener listener) {

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
